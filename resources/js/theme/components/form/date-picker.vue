<script setup>
import { ref, watch } from "vue";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

const props = defineProps({
  label: {
    type: String,
    default: null,
  },
  required: {
    type: Boolean,
    default: false,
  },
  error: String,
  modelValue: [String, Object],
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

// TODO: we need to check by key instead of add all classList to element :)
// watch(
//   () => props.error,
//   (value) => {
//     const elements =
//       document.documentElement.querySelectorAll("input.dp__pointer");

//     for (const dt of elements) {
//       dt.classList.add("dp___error");
//     }
//   }
// );
</script>
<template>
  <div>
    <div v-if="label" class="text-sm mb-1">
      {{ label }} <span v-show="required" class="text-red-500">*</span>
    </div>

    <Datepicker v-model="modelValueRef" v-bind="{ ...$attrs, class: null }" />
  </div>
</template>
<style lang="css">
.dp__input {
  height: 2.6em !important;
}
.dp__error {
  @apply border border-red-500;
}
</style>