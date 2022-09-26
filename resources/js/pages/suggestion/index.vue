<script setup>
import { onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";

defineProps({
  inertable: Object,
});

onMounted(() => {
  window.Echo.channel("suggestion").listen(
    ".App\\Events\\SuggestionEvent",
    (e) => {
      Inertia.reload({
        only: ["inertable"],
      });
    }
  );
});
</script>
<template>
  <div class="p-4 mx-auto">
    <Inertable :data="inertable">
      <!--  -->
    </Inertable>
  </div>
</template>