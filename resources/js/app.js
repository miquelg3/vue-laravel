import { createApp } from 'vue';
require('./bootstrap');

let app=createApp({})
app.component('inicio', require('./components/Inicio.vue').default);
app.mount("#app");
