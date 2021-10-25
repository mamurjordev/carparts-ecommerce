// import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from "vue";
import VueI18n from "vue-i18n";
import {
    App as InertiaApp,
    plugin as InertiaPlugin
} from "@inertiajs/inertia-vue";
import vClickOutside from "v-click-outside";

import { InertiaProgress } from "@inertiajs/progress";
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: "#ff0000",

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: true
});

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(vClickOutside);
Vue.use(require("vue-moment"));
Vue.use(VueI18n);

Vue.prototype.$route = route;
Vue.prototype.$http = window.axios;

const app = document.getElementById("app");

window.axios = require("axios");
Vue.prototype.$http = window.axios;
Vue.prototype.$route = route;

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    require(`./Pages/app/${name}`).default,
                resolveErrors: page => page.props.errors || {}
            }
        })
}).$mount(app);
