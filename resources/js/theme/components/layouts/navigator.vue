<script setup>
import { ref } from "vue";
import { icon } from "./icons";

defineProps({
  navigators: String,
});

const isOpen = ref([]);
</script>
<template>
  <div>
    <ul class="space-y-2 pb-2">
      <li v-for="(navigator, index) in JSON.parse(navigators)" :key="index">
        <v-app-link
          v-if="!navigator.subItems.length"
          :href="route().has(navigator.url) ? route(navigator.url) : '#'"
          :class="{
            'bg-gray-200':
              $page.url ===
              `/` +
                /(http[s]?:\/\/)?([^\/\s]+\/)(.*)/.exec(
                  route(navigator.url)
                )[3],
          }"
          class="
            p-2
            flex
            group
            rounded-lg
            font-normal
            items-center
            transition-all
            hover:bg-gray-200
            text-base text-gray-900
          "
        >
          <component
            :is="icon(navigator.icon)"
            class="
              w-6
              h-6
              duration-75
              text-gray-500
              transition-all
              group-hover:text-gray-900
            "
          />
          <span class="ml-3">{{ navigator.name }}</span>
          <span
            v-show="navigator.badge"
            class="
              ml-auto
              mr-2
              px-1
              py-[1.6px]
              text-sm
              bg-cyan-500
              text-white
              rounded-md
            "
          >
            {{ navigator.badge }}
          </span>
        </v-app-link>
        <a
          v-else
          @click.stop="isOpen[index] = !isOpen[index]"
          :class="{ 'bg-gray-200': isOpen[index] }"
          class="
            p-2
            flex
            group
            rounded-lg
            font-normal
            items-center
            cursor-pointer
            transition-all
            hover:bg-gray-200
            text-base text-gray-900
          "
        >
          <component
            :is="icon(navigator.icon)"
            class="
              w-6
              h-6
              duration-75
              text-gray-500
              transition-all
              group-hover:text-gray-900
            "
          />
          <span class="ml-3">{{ navigator.name }}</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-4 h-4 ml-auto"
            :class="{ 'rotate-180': isOpen[index] }"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19.5 8.25l-7.5 7.5-7.5-7.5"
            />
          </svg>
        </a>

        <template v-if="navigator.subItems.length">
          <ul :class="{ hidden: !isOpen[index] }" class="mt-2">
            <li
              v-for="(subNavigator, subIndex) in navigator.subItems"
              :key="subIndex"
            >
              <v-app-link
                :href="
                  route().has(subNavigator.url) ? route(subNavigator.url) : '#'
                "
                class="
                  p-2
                  flex
                  group
                  w-full
                  pl-[3rem]
                  text-base
                  rounded-lg
                  transition
                  font-normal
                  duration-75
                  items-center
                  text-gray-900
                  hover:bg-gray-100
                "
              >
                {{ subNavigator.name }}
              </v-app-link>
            </li>
          </ul>
        </template>
      </li>
    </ul>
  </div>
</template>