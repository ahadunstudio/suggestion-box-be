<template>
  <div style="height: 50vh">
    <l-map
      v-model="zoom"
      v-model:zoom="zoom"
      :center="[47.41322, -1.219482]"
      @move="log('move')"
      @click="handleClick"
    >
      <l-tile-layer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      ></l-tile-layer>
      <l-control-layers />

      <l-marker :lat-lng="[47.41322, -1.219482]">
        <l-icon :icon-url="iconUrl" :icon-size="iconSize" />
      </l-marker>

      <!-- <l-marker :lat-lng="[50, 50]" draggable @moveend="log('moveend')">
        <l-popup> lol </l-popup>
      </l-marker> -->
    </l-map>
    <button @click="changeIcon">New kitten icon</button>
  </div>
</template>
<script>
import {
  LMap,
  LIcon,
  LPopup,
  LMarker,
  LTooltip,
  LPolygon,
  LPolyline,
  LRectangle,
  LTileLayer,
  LControlLayers,
} from "@vue-leaflet/vue-leaflet";
import "leaflet/dist/leaflet.css";

export default {
  components: {
    LMap,
    LIcon,
    LTileLayer,
    LMarker,
    LControlLayers,
    LTooltip,
    LPopup,
    LPolyline,
    LPolygon,
    LRectangle,
  },
  data() {
    return {
      zoom: 2,
      iconWidth: 25,
      iconHeight: 40,
    };
  },
  computed: {
    iconUrl() {
      return `https://placekitten.com/${this.iconWidth}/${this.iconHeight}`;
    },
    iconSize() {
      return [this.iconWidth, this.iconHeight];
    },
  },
  methods: {
    log(a) {
      console.log(a);
    },
    handleClick(event) {
      const { latlng } = event;

      if (!latlng) return;

      // console.log(latlng);
    },
    changeIcon() {
      this.iconWidth += 2;
      if (this.iconWidth > this.iconHeight) {
        this.iconWidth = Math.floor(this.iconHeight / 2);
      }
    },
  },
};
</script>