<script setup>
import { ref } from "vue";
import {
  EyeIcon,
  TrashIcon,
  Cog6ToothIcon,
  PencilSquareIcon,
} from "@heroicons/vue/24/solid";
import { Inertia } from "@inertiajs/inertia";
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

      <template #participant="{ item: { participant } }">
        <v-badge
          :value="participant.label"
          :color="participant.value == 1 ? 'green' : 'indigo'"
        />
      </template>

      <template #action="{ item }">
        <div class="w-max">
          <v-app-link
            as="button"
            :disabled="item.status.value != 1"
            @click="
              Inertia.post(
                route('admin.suggestions.store.display', {
                  suggestion: item.id,
                })
              )
            "
            class="
              p-2
              rounded-md
              focus:ring-2
              bg-indigo-600
              text-white text-xs
              disabled:bg-opacity-70 disabled:cursor-not-allowed
              focus:ring-indigo-500 focus:outline-none focus:ring-offset-2
            "
          >
            <span v-if="item.status.value != 1">Ditampilkan</span>
            <span v-else>Tampilkan</span>
          </v-app-link>
        </div>
      </template>
    </Inertable>
  </div>
</template>