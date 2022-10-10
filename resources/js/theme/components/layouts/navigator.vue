<script setup>
import { ref, onMounted, computed } from "vue";
import { icon } from "./icons";

const props = defineProps({
  navigators: String,
});

const isOpen = ref([]);

const menuItems = ref([]);

onMounted(() => {
  menuItems.value = JSON.parse(props.navigators);
});

const active = (x) => {
  return route().current(x) ? "bg-gray-200" : "";
};
</script>
<template>
  <div>
    <ul class="space-y-2 pb-2">
      <!-- <li>
        <form action="#" method="GET" class="lg:hidden">
          <label for="mobile-search" class="sr-only">Search</label>
          <div class="relative">
            <div
              class="
                absolute
                inset-y-0
                left-0
                pl-3
                flex
                items-center
                pointer-events-none
              "
            >
              <svg
                class="w-5 h-5 text-gray-500"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                ></path>
              </svg>
            </div>
            <input
              type="text"
              name="email"
              id="mobile-search"
              class="
                bg-gray-50
                border border-gray-300
                text-gray-900 text-sm
                rounded-lg
                focus:ring-cyan-600
                block
                w-full
                pl-10
                p-2.5
              "
              placeholder="Search"
            />
          </div>
        </form>
      </li> -->
      <li v-for="(navigator, index) in menuItems" :key="index">
        <v-app-link
          v-if="!navigator.subItems.length"
          :href="route().has(navigator.url) ? route(navigator.url) : '#'"
          :class="active(navigator.url)"
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