<script setup>
import useFile from "~/utils/file";
import { slugify } from "~/utils/helpers";
import { options, APP_URL } from "./static";
import { reactive, onMounted, ref } from "vue";
import FileIcon from "~/components/file-icon.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import {
  SparklesIcon,
  CloudArrowUpIcon,
  DocumentTextIcon,
} from "@heroicons/vue/24/solid";

const file = reactive({
  ext: null,
});

const props = defineProps({
  setting: Object,
  file_setting: Object,
});

const formOption = useForm({
  selected: props.setting?.screen || null,
});

const formFile = useForm({
  url: null,
  file: null,
});

const onFileChanged = (event) => {
  const fileSelected = event.target.files[0];
  file.ext = useFile(fileSelected)?.ext;

  formFile.file = fileSelected;
};

onMounted(() => {
  if (props.file_setting) {
    formFile.url = props.file_setting.url;
  }
});
</script>
<template>
  <div class="flex flex-col space-y-6">
    <div>
      <h1 class="font-bold text-xl text-gray-700">
        Pengaturan Antar Muka Pengguna
      </h1>

      <ul class="grid gap-6 w-full md:grid-cols-2 mt-6">
        <li v-for="(option, index) in options" :key="index">
          <input
            v-model="formOption.selected"
            type="radio"
            :id="index"
            :value="option.value"
            class="hidden peer"
          />
          <label
            :for="index"
            class="
              p-5
              w-full
              bg-white
              rounded-lg
              inline-flex
              items-center
              cursor-pointer
              justify-between
              text-gray-500
              hover:bg-gray-50 hover:text-gray-600
              border-2 border-gray-200
              peer-checked:text-gray-600 peer-checked:border-blue-600
            "
          >
            <div class="block">
              <component :is="option.icon" class="w-10 h-10" />

              <div class="w-full text-lg font-semibold text-indigo-500 mt-2">
                {{ option.label }}
              </div>
              <div class="w-full text-sm text-gray-600">
                <p>{{ option.summary }}</p>
              </div>
            </div>
          </label>
        </li>
      </ul>

      <div class="w-max mt-4">
        <v-button
          label="Simpan"
          :icon="SparklesIcon"
          :disabled="!formOption.isDirty"
          :loading="formOption.processing"
          @click.prevent="formOption.post(route('admin.setting.store'))"
        />
      </div>
    </div>

    <div>
      <h1 class="font-bold text-xl text-gray-700 mb-6">Pengaturan File</h1>

      <div class="flex flex-col space-y-4">
        <div>
          <div>
            <p class="text-sm font-medium text-gray-900 block mb-2">
              Url
              <span class="text-red-500">*</span>
            </p>
            <div class="flex flex-col">
              <div class="flex">
                <span
                  class="
                    inline-flex
                    items-center
                    px-3
                    text-sm text-gray-900
                    bg-gray-200
                    rounded-l-md
                    border border-r-0 border-gray-300
                  "
                  :class="{ 'border-red-500 border-r-0': formFile.errors.url }"
                >
                  {{ APP_URL }}/file/
                </span>
                <input
                  v-model="formFile.url"
                  @input="formFile.url = slugify($event.target.value)"
                  type="text"
                  class="
                    rounded-none rounded-r-lg
                    bg-gray-50
                    border
                    text-gray-900
                    focus:ring-blue-500 focus:border-blue-500
                    block
                    flex-1
                    min-w-0
                    w-full
                    text-sm
                    border-gray-300
                    p-2.5
                  "
                  :class="{ 'border-red-500': formFile.errors.url }"
                />
              </div>
              <span
                v-if="formFile.errors.url"
                class="text-red-500 text-sm mt-1"
              >
                {{ formFile.errors.url }}
              </span>
            </div>
          </div>
        </div>
        <div class="flex flex-col w-full">
          <p class="text-sm font-medium text-gray-900 block mb-2">
            File
            <span class="text-red-500">*</span>
          </p>
          <label
            for="file"
            class="
              h-64
              w-full
              rounded-lg
              bg-gray-50
              items-center
              flex flex-col
              justify-center
              cursor-pointer
              hover:bg-gray-100
              border-2 border-gray-300 border-dashed
            "
            :class="{ 'border-1 border-red-500': formFile.errors.file }"
          >
            <div class="flex flex-col justify-center items-center pt-5 pb-6">
              <component
                class="mb-3 w-10 h-10 text-gray-400"
                :is="file.ext == 'pdf' ? DocumentTextIcon : FileIcon"
              />

              <p class="mb-2 text-sm text-gray-500">
                <span class="font-semibold">Klik untuk memilih file</span>
              </p>
            </div>
            <input
              id="file"
              type="file"
              class="hidden"
              accept="application/pdf"
              @change="onFileChanged"
            />
          </label>
          <a
            target="blank"
            v-if="file_setting"
            class="my-2 text-indigo-500"
            :href="file_setting.filename_formated"
          >
            Lihat File
          </a>
          <span v-if="formFile.errors.file" class="text-red-500 text-sm mt-1">
            {{ formFile.errors.file }}
          </span>
        </div>
      </div>

      <div class="w-max mt-4">
        <v-button
          label="Unggah"
          :icon="CloudArrowUpIcon"
          :loading="formFile.processing"
          @click.prevent="formFile.post(route('admin.setting.file.store'))"
        />
      </div>
    </div>
  </div>
</template>