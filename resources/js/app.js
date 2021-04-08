require("./bootstrap");

// Import modules...
import { App, plugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import Vue from "vue";
import vuetify from "./Plugins/vuetify";

Vue.use(plugin);

const el = document.getElementById("app");

new Vue({
  vuetify,
  render: (h) =>
    h(App, {
      props: {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: (name) => require(`./Pages/${name}`).default,
      },
    }),
}).$mount(el);

InertiaProgress.init();
