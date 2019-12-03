
window.Vue = require('vue');
window.axios = require('axios');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.prototype.$http = window.axios; <-- AUN NO SE QUE TANTO SE NECESITA



// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('ultimastransferencias-component', require('./components/inicioTransferencias/UltimasTransferenciasComponent.vue').default);
Vue.component('iniciotransferencias-component', require('./components/InicioTransferencia.vue').default);
Vue.component('prueba-component', require('./components/prueba.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
