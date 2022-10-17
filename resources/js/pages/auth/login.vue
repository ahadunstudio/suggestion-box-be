<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { LockClosedIcon } from "@heroicons/vue/24/solid";

const form = useForm({
  // test@mail.com
  // password
  email: null,
  password: null,
});
</script>
<template>
  <div
    class="
      flex
      min-h-full
      items-center
      justify-center
      py-12
      px-4
      sm:px-6
      lg:px-8
    "
  >
    <div
      class="w-full max-w-md space-y-8 bg-gray-50 shadow border p-4 rounded-md"
    >
      <div class="py-4">
        <img
          class="mx-auto h-12 w-auto"
          src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
          alt="Your Company"
        />

        <h2
          class="
            mt-6
            text-center text-3xl
            font-bold
            tracking-tight
            text-gray-900
          "
        >
          Masuk ke akun anda
        </h2>
      </div>
      <form class="mt-8 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true" />
        <div class="space-y-4 rounded-md shadow-sm">
          <v-input
            v-model="form.email"
            :error="form.errors.email"
            label="Email"
            :required="true"
          />

          <v-input
            v-model="form.password"
            :error="form.errors.password"
            label="Password"
            type="password"
            :required="true"
          />
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input
              id="remember-me"
              name="remember-me"
              type="checkbox"
              class="
                h-4
                w-4
                rounded
                border-gray-300
                text-indigo-600
                focus:ring-indigo-500
              "
            />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900"
              >Remember me</label
            >
          </div>
        </div>

        <v-button
          @click.prevent="form.post(route('auth.login.store'))"
          :icon="LockClosedIcon"
          :loading="form.processing"
          label="Masuk"
        />
      </form>
    </div>
  </div>
</template>