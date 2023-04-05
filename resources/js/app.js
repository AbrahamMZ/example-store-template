require("./bootstrap");

// Import modules...
import Vue from "vue";
import { App, plugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import VueMeta from "vue-meta";
import PortalVue from "portal-vue";
import vuetify from "./Plugins/vuetify";
import eventBus from "./Plugins/event-bus";
import ImageMagnifier from "vue-image-magnifier";

Vue.use(plugin);
Vue.use(PortalVue);
Vue.use(VueMeta);
Vue.use(eventBus);
Vue.use(ImageMagnifier);
Vue.mixin({ methods: { route: window.route } });

const el = document.getElementById("app");

new Vue({
  vuetify,
  metaInfo: {
    titleTemplate: (title) => (title ? `${title} - ETBSA` : "ETBSA"),
  },
  render: (h) =>
    h(App, {
      props: {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: (name) => require(`./Pages/${name}`).default,
      },
    }),
}).$mount(el);

InertiaProgress.init();
