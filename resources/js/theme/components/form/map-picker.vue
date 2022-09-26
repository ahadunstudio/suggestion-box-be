<script setup>
import {
  LMap,
  LPopup,
  LMarker,
  LCircle,
  LTooltip,
  LTileLayer,
  LCircleMarker,
} from "@vue-leaflet/vue-leaflet";
import "leaflet/dist/leaflet.css";

import { formatNumber } from "~/utils/helpers";
import { onMounted, reactive, ref } from "vue";

const props = defineProps({
  label: {
    type: String,
    default: null,
  },
  required: {
    type: Boolean,
    default: false,
  },
  cordinate: Object,
});

const map = reactive({
  zoom: 17,
  radius: props.cordinate.radius,
});

const emit = defineEmits(["marker", "openModal"]);

const cordinate = ref([]);

onMounted(() => (cordinate.value = [props.cordinate.lat, props.cordinate.lng]));

const handleClick = (event) => {
  const { latlng } = event;

  if (!latlng) return;

  const { lat, lng } = latlng;

  cordinate.value = [lat, lng];

  emit("marker", {
    lat: cordinate.value[0],
    lng: cordinate.value[1],
    radius: props.cordinate.radius,
  });
};
</script>

<template>
  <div class="flex items-center mb-3">
    <span v-show="label">
      {{ label }} <span class="text-red-500" v-show="required">*</span>
    </span>

    <button
      type="button"
      @click="
        emit('openModal', {
          lat: cordinate[0],
          lng: cordinate[1],
          radius: map.radius,
        })
      "
      class="ml-auto py-2 px-3 rounded-md text-cyan-600 text-sm"
    >
      Atur Manual
    </button>
  </div>

  <div style="height: 60vh">
    <l-map
      v-model="map.zoom"
      @click="handleClick"
      v-model:zoom="map.zoom"
      class="rounded-md z-10"
      :center="[props.cordinate.lat, props.cordinate.lng]"
    >
      <l-tile-layer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      ></l-tile-layer>

      <l-marker :lat-lng="cordinate">
        <l-popup> Lokasi </l-popup>
      </l-marker>

      <!-- radius in meters -->
      <LCircle :lat-lng="cordinate" :radius="map.radius" />
    </l-map>
  </div>

  <div class="flex mt-4">
    <div class="flex flex-row items-center space-x-2">
      <p>
        Lat: <span class="text-cyan-700">{{ cordinate[0] }}</span>
      </p>
      <p>
        Lng: <span class="text-cyan-700">{{ cordinate[1] }}</span>
      </p>
      <p>
        Radius:
        <span class="text-cyan-700">{{ formatNumber(map.radius) }}M</span>
      </p>
    </div>
  </div>
</template>
<style lang="css">
.leaflet-bottom.leaflet-right {
  display: none !important;
}
</style>