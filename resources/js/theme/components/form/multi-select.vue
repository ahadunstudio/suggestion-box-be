<template>
  <div>
    <label v-if="label" class="text-sm">
      {{ label }} <span v-show="required" class="text-red-500">*</span>
    </label>

    <Multiselect
      ref="selectRef"
      :delay="0"
      v-bind="{ ...$attrs }"
      :object="true"
      v-model="modelValueRef"
      :min-chars="1"
      :searchable="true"
      :filter-results="false"
      :resolve-on-load="false"
      :options="options"
      :placeholder="placeholder"
      :classes="MultiSelectClasses"
      no-options-text="Tidak ada piilhan"
      :class="[
        error
          ? 'border-red-500 dark:border-red-500'
          : 'border-gray-300 dark:border-cool-gray-500',
      ]"
    >
      <template #singlelabel="{ value }">
        <slot name="singlelabel" :value="value" />
      </template>

      <template #option="{ option }">
        <slot name="option" :option="option" />
      </template>
    </Multiselect>
    <div v-if="error" class="text-red-500">
      {{ error }}
    </div>
  </div>
</template>
<script setup>
import { watch, ref } from "vue";
import { MultiSelectClasses } from "./static";
import Multiselect from "@vueform/multiselect";
import { XMarkIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
  error: {
    type: String,
    required: false,
    default: null,
  },
  label: {
    type: String,
    required: false,
    default: null,
  },
  required: {
    type: Boolean,
    default: () => false,
  },
  modelValue: {
    type: Object,
  },
  options: {
    type: [Array, Function],
    required: true,
  },
  placeholder: {
    type: String,
    required: false,
  },
});

const modelValueRef = ref(props.modelValue);

const emit = defineEmits(["update:modelValue"]);

watch(
  () => modelValueRef.value,
  (value) => {
    emit("update:modelValue", value);
  }
);

watch(
  () => props.modelValue,
  (value) => {
    modelValueRef.value = value;
  }
);
</script>