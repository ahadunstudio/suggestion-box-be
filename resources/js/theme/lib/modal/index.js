import { h, render } from "vue";
import Default from "./Components/default.vue";

let currentModal = null;

export const useModal = (app, options) => {
    const component = (props, child) => {
        const node = h(Default, props, child);

        if (app?._context) {
            node.appContext = app._context;
        }

        currentModal = node;

        render(node, document.body);

        node.component.exposed.openModal();
    };

    return {
        open(props) {
            const childComponent = () => h(props.component, props);

            component(props, childComponent);
        },
        close() {
            currentModal.component.exposed.closeModal();
        },
    };
};

export default {
    install: (app, options) => {
        const instance = useModal(app, options);

        app.config.globalProperties.$modal = instance;
        app.provide("$modal", instance);
    },
};
