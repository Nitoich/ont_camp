const Camps = {
    data() {
        return {
            lists: {
                regionsList: undefined,
                campsList: undefined
            },
            csrf: document.querySelector('input[name="_token"]').value,
            idRegion: '',
            idCamp: '',
            inputs: {
                addRegion: '',
                addCamp: ''
            }
        }
    },
    mounted() {
        console.log('Camps vue app mounted!');
        this.getRegions();
    },
    methods: {
        getRegions() {
            fetch(`/region?_token=${this.csrf}`, {
                credentials: 'same-origin'
            })
                .then(res => {return res.json()})
                .then(res => {
                    console.log(res);
                    this.lists.regionsList = res;
                })
        },
        getCamps() {
            fetch(`/camp?_token=${this.csrf}&id=${this.idRegion}`, {
                credentials: 'same-origin'
            })
                .then(res => {return res.json()})
                .then(res => {
                    console.log(res);
                    this.lists.campsList = res;
                })
        },
        selectRegion(event) {
            this.idRegion = event.target.getAttribute('data-id');
        },
        addRegion() {
            if(this.inputs.addRegion != '') {
                fetch(`/region?_token=${this.csrf}&name=${this.inputs.addRegion}`, {
                    credentials: 'same-origin',
                    method: 'post'
                })
                    .then(res => {
                        console.log(res.json())
                        if(res.status != 201) {
                            alert('Error!');
                        } else {
                            this.getRegions();
                        }
                    })
            }
        },
        addCamp() {
            if(this.inputs.addCamp != '' && this.idRegion != '') {
                fetch(`/camp?_token=${this.csrf}&name=${this.inputs.addCamp}&region_id=${this.idRegion}`, {
                    credentials: 'same-origin',
                    method: 'post'
                })
                    .then(res => {
                        console.log(res.json())
                        if(res.status != 201) {
                            alert('Error!');
                        } else {
                            this.getCamps();
                        }
                    })
            }
        },
        delCamp(event) {
            fetch(`/camp?_token=${this.csrf}&id=${event.target.getAttribute('data-id')}`, {
                credentials: 'same-origin',
                method: 'delete'
            })
                .then(res => {
                    console.log(res.json())
                    if(res.status != 200) {
                        alert('Error!');
                    } else {
                        this.getCamps();
                    }
                })
        },
        delRegion(event) {
            fetch(`/region?_token=${this.csrf}&id=${event.target.getAttribute('data-id')}`, {
                credentials: 'same-origin',
                method: 'delete'
            })
                .then(res => {
                    console.log(res.json())
                    if(res.status != 200) {
                        alert('Error!');
                    } else {
                        this.getRegions();
                        this.lists.campsList = undefined;
                    }
                })
        }
    },
    watch: {
        idRegion: function() {
            this.getCamps();
        }
    }
};

window.addEventListener('DOMContentLoaded', (event) => {
    window.CampsVue = Vue.createApp(Camps).mount('#camps');
});
