<script setup>
import { ref, onMounted } from "vue";
import animate from "~/utils/animate";
import WsView from "~/components/ws-view.vue";

const TIMEOUT = 7000; // 7 seconds

const canvas = ref(null);

const props = defineProps({
  items: Object,
});

const item = ref(null);

onMounted(() => {
  animate(canvas);

  setInterval(() => {
    item.value = props.items[Math.floor(Math.random() * props.items.length)];
  }, TIMEOUT);
});
</script>
<template>
  <WsView>
    <div class="w-full h-full overflow-auto relative">
      <div class="flex justify-center absolute z-50 top-8 inset-x-0">
        <img
          alt="Logo"
          class="lg:w-[45em] w-[20em]"
          src="../../../../assets/img/pk.png"
        />
      </div>
      <div
        class="
          flex
          w-full
          h-screen
          items-center
          justify-center
          text-white text-center
        "
      >
        <canvas ref="canvas"></canvas>
        <div class="flex flex-col space-y-2">
          <h1 class="text-[5em]">
            <span v-if="item">{{ item.suggestion }}</span>
            <span v-else>Selamat Datang di Acara Raker Korporat</span>
          </h1>
          <span v-if="item" class="text-[1.5em]">
            {{ item.name }}
          </span>
        </div>
      </div>
    </div>
  </WsView>
</template>
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