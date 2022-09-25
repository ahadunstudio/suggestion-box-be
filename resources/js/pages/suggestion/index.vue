<script setup>
import { onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";

defineProps({
  inertable: Object,
});

onMounted(() => {
  window.Echo.channel("suggestion")
    .listen(".App\\Events\\SuggestionEvent",
    (e) => {
      Inertia.reload({
        only: ["inertable"],
      });
    }
  );
});
</script>
<template>
  <div>
    <h1 class="text-2xl bg-red-500">Suggestion Lists</h1>

    <table>
      <tbody>
        <tr v-for="(item, index) in inertable.data.data" :key="index">
          <td>{{ item }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>