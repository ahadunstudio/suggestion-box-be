<script setup>
import { formatNumber } from "~/utils/helpers";
import { InboxIcon } from "@heroicons/vue/24/solid";

defineProps({
  cards: Object,
});
</script>
<template>
  <div>
    <h1 class="font-bold text-xl text-gray-700">Dashboard</h1>

    <div class="grid gap-4 mb-8 md:grid-cols-3 mt-4">
      <div
        v-for="(item, index) in cards"
        :key="index"
        class="flex items-center p-2 bg-gray-50 rounded-lg shadow border"
      >
        <div class="p-3 mr-4 rounded-md text-indigo-500 bg-indigo-100">
          <InboxIcon class="w-5 h-5" />
        </div>
        <div class="flex flex-col mt-2">
          <p class="mb-2 text-xs font-medium text-gray-600">{{ item.label }}</p>
          <p class="text-lg font-semibold text-gray-700">
            {{ formatNumber(item.value) }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>