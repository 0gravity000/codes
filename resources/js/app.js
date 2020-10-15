/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueRouter from 'vue-router';

import HeaderComponent from "./components/HeaderComponent";
import HelloWorld from "./components/codesjs/HelloWorld";
import DigitalClock from "./components/codesjs/DigitalClock";
import AnalogClock from "./components/codesjs/AnalogClock";

import HelloVue from "./components/vuejs/HelloVue";
import VshowDirective from "./components/vuejs/VshowDirective";
import VbindClassDirective from "./components/vuejs/VbindClassDirective";
import VbindStyleDirective from "./components/vuejs/VbindStyleDirective";
import VforDirective from "./components/vuejs/VforDirective";

require('./bootstrap');

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
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/codejs/helloworld',
            component: HelloWorld
        },
        {
            path: '/codejs/digitalclock',
            component: DigitalClock
        },
        {
            path: '/codejs/analogclock',
            component: AnalogClock
        },

        {
            path: '/vuejs/hellovue',
            component: HelloVue
        },
        {
            path: '/vuejs/vshow-directive',
            component: VshowDirective
        },
        {
            path: '/vuejs/vbind-class-directive',
            component: VbindClassDirective
        },
        {
            path: '/vuejs/vbind-style-directive',
            component: VbindStyleDirective
        },
        {
            path: '/vuejs/vfor-directive',
            component: VforDirective
        },

    ]
});


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('header-component', HeaderComponent);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
