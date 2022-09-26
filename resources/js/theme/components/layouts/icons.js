import { h } from "vue";
import {
    HomeIcon,
    Cog6ToothIcon,
    Cog8ToothIcon,
    UserGroupIcon,
    CalendarIcon,
    DocumentTextIcon,
} from "@heroicons/vue/20/solid";

// if u know how to using require function on vite
// u can using it instead of check one by one
export function icon(key, props = {}) {
    if (key === "HomeIcon") return h(HomeIcon, props);
    if (key === "UserGroupIcon") return h(UserGroupIcon, props);
    if (key === "DocumentTextIcon") return h(DocumentTextIcon, props);
    if (key === "Cog6ToothIcon") return h(Cog6ToothIcon, props);
    if (key === "Cog8ToothIcon") return h(Cog8ToothIcon, props);
    if (key === "CalendarIcon") return h(CalendarIcon, props);
}
