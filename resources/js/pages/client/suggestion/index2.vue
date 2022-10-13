<template>
  <div
    class="
      flex
      w-full
      h-screen
      items-center
      overflow-auto
      justify-center
      text-white text-center
    "
  >
    <canvas ref="canvas"></canvas>
    <div class="flex flex-col space-y-2">
      <h1>
        {{ item.suggestion }}
      </h1>
      <span class="text-[2em]">{{ item.name }}</span>
    </div>
  </div>
</template>
<script setup>
import animate from "~/utils/animate";
import { Inertia } from "@inertiajs/inertia";
import { ref, onMounted, onBeforeUnmount } from "vue";

const canvas = ref(null);
const polling = ref(null);

const props = defineProps({
  item: Object,
});

onMounted(() => {
  animate(canvas);

  polling.value = setInterval(() => {
    Inertia.visit(`/suggestions?id=${props.item?.id}`, {
      only: ["item"],
    });
  }, 7000);
});

onBeforeUnmount(() => clearInterval(polling.value));
</script>
<style lang="css" scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Roboto";
  font-weight: 100;
}

h1 {
  text-transform: uppercase;
  letter-spacing: 0.5em;
  font-size: clamp(1em, 5vw, 4em);
}

h1,
span {
  font-weight: 300;
  animation: breath 10000ms ease-in-out infinite alternate;
}

@keyframes breath {
  0% {
    transform: scale(0.9);
  }
  100% {
    transform: scale(1);
  }
}

canvas {
  position: absolute;
  top: 0;
  left: 0;
  margin: 0;
  padding: 0;
  background-color: #104068;
}
</style>