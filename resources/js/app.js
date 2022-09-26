import "./bootstrap";
import "../css/app.css";
import "../css/fonts.css";

// Core
import { createApp, h } from "vue";
import { InertiaProgress } from "@inertiajs/progress";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

// Theme
import Theme from "./theme";
import Inertable from "./@rizkhal/inertable-vue";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Presence";

// separating layout here if u want
// const guests = ["auth/login", "welcome"];

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name) => {
        const page = await resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/**/*.vue")
        );

        // if (guests.includes(name)) {
        //     page.default.layout = GuestLayout;
        // }

        // if (page.default.layout === undefined) {
        //     page.default.layout = AuthenticatedLayout;
        // }

        return page;
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(Theme)
            .use(Inertable)
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });
