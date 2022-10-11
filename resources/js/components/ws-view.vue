<script setup>
import { Inertia } from "@inertiajs/inertia";
import { SUGGESTION_STATUS } from "~/utils/enums.js";

window.Echo.channel("router-view").listen(
  ".App\\Events\\RouterEvent",
  ({ setting: { screen } }) => {
    if (screen == SUGGESTION_STATUS.ALL) {
      Inertia.visit(route("suggestions.index"));
    }

    if (screen == SUGGESTION_STATUS.SELECTED) {
      Inertia.visit(route("suggestions.selected"));
    }
  }
);
</script>
<template>
  <div>
    <slot />
  </div>
</template>