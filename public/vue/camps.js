const Camps = {
    data() {
        return {
            csrf: document.querySelector('input[name="_token"]').value,
            idRegion: '',
            idCamp: '',
            regionsList: undefined,
            campsList: undefined
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
                    this.regionsList = res;
                })
        },
        getCamps() {
            fetch(`/camp?_token=${this.csrf}&id=${this.idRegion}`, {
                credentials: 'same-origin'
            })
                .then(res => {return res.json()})
                .then(res => {
                    console.log(res);
                    this.campsList = res;
                })
        },
        selectRegion(event) {
            this.idRegion = event.target.getAttribute('data-id');
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
