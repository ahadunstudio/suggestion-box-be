<script setup>
import { options } from "./static";
import { useForm } from "@inertiajs/inertia-vue3";
import { SparklesIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
  setting: Object,
});

const form = useForm({
  selected: props.setting?.screen || null,
});
</script>
<template>
  <h1 class="font-bold text-xl text-gray-700">
    Pengaturan Antar Muka Pengguna
  </h1>

  <div>
    <ul class="grid gap-6 w-full md:grid-cols-2 mt-6">
      <li v-for="(option, index) in options" :key="index">
        <input
          v-model="form.selected"
          type="radio"
          :id="index"
          :value="option.value"
          class="hidden peer"
        />
        <label
          :for="index"
          class="
            p-5
            w-full
            bg-white
            rounded-lg
            inline-flex
            items-center
            cursor-pointer
            justify-between
            text-gray-500
            hover:bg-gray-50
            hover:text-gray-600
            border-2 border-gray-200
            peer-checked:text-gray-600
            peer-checked:border-blue-600
          "
        >
          <div class="block">
            <component :is="option.icon" class="w-10 h-10" />

            <div class="w-full text-lg font-semibold text-indigo-500 mt-2">
              {{ option.label }}
            </div>
            <div class="w-full text-sm text-gray-600">
              <p>{{ option.summary }}</p>
            </div>
          </div>
        </label>
      </li>
    </ul>

    <div class="w-max mt-4">
      <v-button
        label="Simpan"
        :icon="SparklesIcon"
        :disabled="!form.isDirty"
        :loading="form.processing"
        @click.prevent="form.post(route('admin.setting.store'))"
      />
    </div>
  </div>
</template>