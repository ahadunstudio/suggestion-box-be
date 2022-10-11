// inertia
import { Link } from "@inertiajs/inertia-vue3";

// layouts
import Header from "./components/layouts/header.vue";
import Footer from "./components/layouts/footer.vue";
import Sidebar from "./components/layouts/sidebar.vue";
import Backdrop from "./components/layouts/backdrop.vue";
import Navigator from "./components/layouts/navigator.vue";
import Breadcrumbs from "./components/layouts/breadcrumbs.vue";

// form
import Input from "./components/form/input.vue";
import Select from "./components/form/select.vue";
import FormContainer from "./components/form/container.vue";
import MultiSelect from "./components/form/multi-select.vue";

// library
import Modal from "./lib/modal";

// common
import Alert from "./components/common/alert.vue";
import Badge from "./components/common/badge.vue";
import NotAvailable from "./components/common/na.vue";
import LoadingButton from "./components/common/loading-button.vue";
import Dropdown from "./components/common/dropdown.vue";
import DropdownLink from "./components/common/dropdown-link.vue";
import DropdownButton from "./components/common/dropdown-button.vue";

import WebsocketView from "~/components/ws-view.vue";

export default {
    install(app, config) {
        // custom webscoket view
        app.component("v-ws-view", WebsocketView);

        // inertia
        app.component("v-app-link", Link);

        // lib: modal, inertable
        app.use(Modal);

        // layouts
        app.component("Header", Header);
        app.component("Footer", Footer);
        app.component("Sidebar", Sidebar);
        app.component("Backdrop", Backdrop);
        app.component("Navigator", Navigator);
        app.component("Breadcrumbs", Breadcrumbs);

        // form
        app.component("v-form-container", FormContainer);
        app.component("v-input", Input);
        app.component("v-select", Select);
        app.component("v-multi-select", MultiSelect);

        // common
        app.component("v-alert", Alert);
        app.component("v-badge", Badge);
        app.component("v-na", NotAvailable);
        app.component("v-button", LoadingButton);
        app.component("v-dropdown", Dropdown);
        app.component("v-dropdown-link", DropdownLink);
        app.component("v-dropdown-button", DropdownButton);
    },
};
