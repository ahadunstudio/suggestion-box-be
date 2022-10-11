<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { SparklesIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
  statuses: Object,
  selected: [Array, Object],
});

const form = useForm({
  status: null,
  selected: props.selected.map((v) => v.id),
});
</script>
<template>
  <div>
    <div class="p-4 border-b">
      <h1 class="text-xl font-bold">Ubah Status</h1>
    </div>
    <div class="p-4">
      <v-select
        :required="true"
        label="Pilih Status"
        v-model="form.status"
        :error="form.errors.status"
      >
        <option
          v-for="(status, index) in statuses"
          :key="index"
          :value="status.value"
        >
          {{ status.label }}
        </option>
      </v-select>
    </div>
    <div class="p-4 border-t">
      <v-button
        label="Perbarui"
        class="btn-indigo"
        :icon="SparklesIcon"
        :loading="form.processing"
        @click.prevent="
          form.post(route('admin.suggestions.store.status'), {
            onSuccess: () => $modal.close(),
          })
        "
      />
    </div>
  </div>
</template>