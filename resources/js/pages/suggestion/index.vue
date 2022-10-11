<script setup>
import { ref } from "vue";
import {
  TrashIcon,
  Cog6ToothIcon,
  PencilSquareIcon,
} from "@heroicons/vue/24/solid";
import { ModalDialog, StatusModal } from "./modal.js";

const selected = ref([]);

defineProps({
  statuses: Object,
  inertable: Object,
});
</script>
<template>
  <div class="mx-auto">
    <Inertable
      :data="inertable"
      @onSelect="selected.value = $event"
      @onSelectAll="selected.value = $event"
    >
      <template #attributes>
        <div v-show="selected.value?.length">
          <v-dropdown width="48" align="right">
            <template #trigger>
              <button class="btn-indigo">
                <Cog6ToothIcon class="mr-2 h-4 w-4" />
                <span>Pilihan</span>
              </button>
            </template>
            <template #content>
              <div class="flex flex-col space-y-2">
                <v-dropdown-button
                  @click.prevent="
                    $modal.open({
                      position: 'center',
                      component: ModalDialog,
                      message: `Anda memilih ${selected.value.length} baris, baris yang telah dihapus tidak dapat dikembalikan.`,
                      url: {
                        name: 'admin.suggestions.delete',
                        params: {
                          selected: selected.value.map((v) => v.id),
                        },
                      },
                    })
                  "
                  class="flex items-center space-x-1"
                >
                  <TrashIcon class="w-4 h-4" />
                  <span>Hapus</span>
                </v-dropdown-button>

                <v-dropdown-button
                  @click.prevent="
                    $modal.open({
                      statuses,
                      maxWidth: '2xl',
                      selected: selected.value,
                      component: StatusModal,
                    })
                  "
                  class="flex items-center space-x-1"
                >
                  <PencilSquareIcon class="w-4 h-4" />
                  <span>Ubah Status</span>
                </v-dropdown-button>
              </div>
            </template>
          </v-dropdown>
        </div>
      </template>

      <template #status="{ item: { status } }">
        <v-badge
          :value="status.label"
          :color="status.value == 1 ? 'red' : 'indigo'"
        />
      </template>
    </Inertable>
  </div>
</template>