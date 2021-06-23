"use strict";

var _viewDesign = _interopRequireDefault(require("view-design"));

var _common = _interopRequireDefault(require("./common"));

var _routes = _interopRequireDefault(require("./routes"));

require("view-design/dist/styles/iview.css");

var _OrdersComponent = _interopRequireDefault(require("./components/OrdersComponent.vue"));

var _FAQsComponent = _interopRequireDefault(require("./components/FAQsComponent.vue"));

var _DashboardComponent = _interopRequireDefault(require("./components/DashboardComponent.vue"));

var _HomeComponent = _interopRequireDefault(require("./components/HomeComponent.vue"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
Vue.use(_viewDesign["default"]);
Vue.mixin(_common["default"]);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('orders', require('./components/orders.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var app = new Vue({
  el: '#app',
  router: _routes["default"],
  render: function render(h) {
    return h(_HomeComponent["default"]);
  }
});