<script setup>
defineProps({
  loading: {
    type: Boolean,
    default: false,
  },
  label: {
    type: String,
    required: true,
  },
  icon: {
    default: null,
  },
});
</script>
<template>
  <button
    class="
      py-2
      px-4
      group
      flex
      w-full
      text-sm
      relative
      space-x-1
      rounded-md
      font-medium
      text-white
      items-center
      justify-center
      bg-indigo-600
      hover:bg-indigo-700
      border border-transparent
      disabled:bg-opacity-70 disabled:cursor-not-allowed
      focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
    "
    :class="{ 'bg-opacity-80': loading }"
  >
    <component
      v-if="icon && !loading"
      :is="icon"
      class="h-4 w-4 text-gray-100"
    />

    <span v-if="loading" class="mr-1 h-4 w-4">
      <svg
        class="-ml-1 mr-3 h-5 w-5 animate-spin text-white"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
      >
        <circle
          class="opacity-25"
          cx="12"
          cy="12"
          r="10"
          stroke="currentColor"
          stroke-width="4"
        ></circle>
        <path
          class="opacity-75"
          fill="currentColor"
          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
        ></path>
      </svg>
    </span>

    <div>
      <span v-if="!loading">{{ label }}</span>
      <span v-else>Loading ...</span>
    </div>
  </button>
</template>