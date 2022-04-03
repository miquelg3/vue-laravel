import { createApp } from 'vue';
require('./bootstrap');

let app=createApp({})
app.component('boto', require('./components/Boto.vue').default);
app.component('simondice', require('./components/SimonDice.vue').default);
app.mount("#app");