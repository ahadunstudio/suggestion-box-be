<template>
  <span
    :class="{
      'text-gray-400': value == 'N/A' || value == null || value == '',
    }"
  >
    {{ value == null || value == "" ? "N/A" : value }}
  </span>
</template>
<script>
export default {
  props: {
    value: [String, Number],
  },
};
</script>