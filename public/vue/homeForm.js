const HomeForm = {
    data() {
        return {
            idRegion: '',
            campsList: undefined
        }
    },
    mounted() {
        console.log('Mounted!')
    }
}

window.addEventListener('DOMContentLoaded', (event) => {
    window.HomeForm = Vue.createApp(HomeForm).mount('#home-form-send-request');
});
