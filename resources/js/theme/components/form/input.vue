<template>
  <div :class="$attrs.class">
    <label
      v-if="label"
      class="text-sm font-medium text-gray-900 block mb-2"
      :for="id"
    >
      {{ label }}
      <span v-show="required" class="text-red-500">*</span>
    </label>
    <input
      :id="id"
      ref="input"
      :type="type"
      :value="modelValue"
      v-bind="{ ...$attrs, class: null }"
      :class="{ 'border-red-500 border': error }"
      @input="$emit('update:modelValue', $event.target.value)"
      class="
        p-2.5
        block
        w-full
        sm:text-sm
        rounded-lg
        bg-gray-50
        text-gray-900
        border border-gray-300
        focus:ring-cyan-600 focus:border-cyan-600
        disabled:cursor-not-allowed disabled:bg-gray-200
      "
    />
    <div v-if="error" class="text-red-500 text-sm mt-1">{{ error }}</div>
  </div>
</template>

<script>
import { v4 as uuid } from "uuid";

export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${uuid()}`;
      },
    },
    type: {
      type: String,
      default: "text",
    },
    error: String,
    label: String,
    required: {
      type: Boolean,
      default: false,
    },
    modelValue: [String, Number],
  },
  emits: ["update:modelValue"],
  methods: {
    focus() {
      this.$refs.input.focus();
    },
    select() {
      this.$refs.input.select();
    },
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end);
    },
  },
};
</script>