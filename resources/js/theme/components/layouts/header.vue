<script setup>
import {
  LockClosedIcon,
  ArrowLeftOnRectangleIcon,
} from "@heroicons/vue/24/outline";
import ResetPasswordModal from "./reset-password-modal.vue";

const props = defineProps({
  user: Object,
  state: Boolean,
});
</script>
<template>
  <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button
            @click.prevent="$emit('toggleSidebar')"
            aria-expanded="true"
            aria-controls="sidebar"
            class="
              lg:hidden
              mr-2
              text-gray-600
              hover:text-gray-900
              cursor-pointer
              p-2
              hover:bg-gray-100
              focus:bg-gray-100 focus:ring-2 focus:ring-gray-100
              rounded
            "
          >
            <!-- open -->
            <svg
              v-if="!state"
              class="w-6 h-6"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
              ></path>
            </svg>

            <!-- close -->
            <svg
              v-else
              class="w-6 h-6"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>

          <a href="#" class="text-xl font-bold flex items-center lg:ml-2.5">
            <div class="self-center ml-2">
              <span class="font-extrabold">EVENT&nbsp;</span>
              <span class="whitespace-nowrap">ORGANIZER</span>
            </div>
          </a>
        </div>

        <div class="flex items-center">
          <v-dropdown width="48" align="right">
            <template #trigger>
              <img
                class="rounded-full w-10 h-10 cursor-pointer"
                :src="user.profile_picture"
                :alt="user.name"
              />
            </template>
            <template #content>
              <div class="flex flex-col space-y-2">
                <v-dropdown-link
                  as="button"
                  type="button"
                  method="delete"
                  :href="route('auth.logout')"
                  class="flex flex-row space-x-1 items-center"
                >
                  <ArrowLeftOnRectangleIcon class="w-5 h-5" />
                  <span>Keluar</span>
                </v-dropdown-link>
                <v-dropdown-button
                  @click.prevent="
                    $modal.open({
                      maxWidth: 'xl',
                      component: ResetPasswordModal,
                    })
                  "
                  class="flex flex-row space-x-1 items-center"
                >
                  <LockClosedIcon class="w-5 h-5" />
                  <span>Ubah Password</span>
                </v-dropdown-button>
              </div>
            </template>
          </v-dropdown>
        </div>
      </div>
    </div>
  </nav>
</template>