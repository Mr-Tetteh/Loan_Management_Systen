<script setup>
import {reactive} from "vue";
import {useRoute} from "vue-router";
import axios from "axios";
import router from "@/router/index.js";
import Swal from "sweetalert2";
import useLogin from "@/composerables/useLogin.js";

const {reset, token, password,confirm_password, reset_password} = useLogin()
console.log(router)
const form = reactive({
  token: router.params.token,
  email: "",
  password: "",
  confirm_password:""
})

const submit = async () => {
  await reset_password({...form })
}
</script>

<template>
  <div class="bg-fuchsia-100 grid grid-cols-1 lg:grid-cols-2 min-h-screen items-center px-6 lg:px-8 shadow-2xl">
    <div class="px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-32 w-auto rounded-full" src="../../../tsclogo.png"
             alt="Your Company"/>
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
          Password reset
        </h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" @submit.prevent="submit">
          <input v-model="form.password" id="email" type="password" autocomplete="email" required=""
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                 placeholder="New Password"/>

          <input v-model="form.confirm_password" id="email" type="password" autocomplete="email" required=""
                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                 placeholder="Confirm Password"/>

          <div>
            <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Continue
            </button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
          <router-link to="login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"/>
            </svg>
            Back to log in!
          </router-link>
        </p>
      </div>
    </div>

    <!-- Right Column: Image -->
    <div class="flex justify-center lg:justify-end px-6 py-12 lg:px-40 ">
      <img src="../../../forgotPassword.jpg" alt="Login Image"
           class="max-w-full h-auto lg:max-w-md shadow-2xl rounded-2xl"/>
    </div>
  </div>

</template>

<style scoped>

</style>