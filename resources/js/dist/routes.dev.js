"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vueRouter = _interopRequireDefault(require("vue-router"));

var _DashboardComponent = _interopRequireDefault(require("./components/DashboardComponent.vue"));

var _FAQsComponent = _interopRequireDefault(require("./components/FAQsComponent.vue"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

_vue["default"].use(_vueRouter["default"]);

var routes = [{
  path: '/dashboard',
  component: _DashboardComponent["default"]
}, {
  path: "/faq",
  component: _FAQsComponent["default"]
}];

var _default = new _vueRouter["default"]({
  mode: 'history',
  routes: routes
});

exports["default"] = _default;