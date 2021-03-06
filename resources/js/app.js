/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./chart');
require('./home');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('carousel-component', require('./components/Carousel.vue').default);


/* Chart - component */
/* Vue.component('chart-month-messages-component', require('./components/MonthMessagesDoctorChart.vue').default);

Vue.component('chart-years-messages-component', require('./components/YearMessagesDoctorChart.vue').default); */

/*End Chart - component */

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';
import VueSlickCarousel from 'vue-slick-carousel';

Vue.component('VueSlickCarousel', VueSlickCarousel);

const app = new Vue({
    el: '#app',
});
