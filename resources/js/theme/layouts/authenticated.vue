<script setup>
import { watch, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { useToast } from "vue-toast-notification";

const toast = useToast();

const sidebarState = ref(false);

const props = defineProps({
  auth: Object,
  flash: Object,
  navigators: String,
  breadcrumbs: Object,
});

Inertia.on("success", (event) => {
  sidebarState.value = false;
});

watch(
  () => props.flash,
  (payload) => {
    if (payload) {
      if (payload.success) {
        toast.success(payload.success, {
          position: "top-right",
        });
      }

      if (payload.error) {
        toast.error(payload.error, {
          position: "top-right",
        });
      }

      if (payload.info) {
        toast.info(payload.info, {
          position: "top-right",
        });
      }

      if (payload.warning) {
        toast.warning(payload.warning, {
          position: "top-right",
        });
      }
    }
  },
  { deep: true }
);
</script>
<template>
  <div>
    <Header
      :user="auth.user"
      :state="sidebarState"
      @toggleSidebar="sidebarState = !sidebarState"
    />

    <div class="flex overflow-hidden bg-white pt-16">
      <Sidebar :state="sidebarState" :navigators="navigators" />

      <div
        id="main-content"
        class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64"
      >
        <main>
          <div
            class="
              p-4
              bg-white
              block
              sm:flex
              items-center
              justify-between
              border-b border-gray-200
              lg:mt-1.5
            "
          >
            <div class="mb-1 w-full">
              <div class="mb-4">
                <Breadcrumbs :lists="breadcrumbs" />

                <slot />
              </div>
            </div>
          </div>
        </main>

        <!-- <Footer /> -->
      </div>
    </div>
  </div>
</template>