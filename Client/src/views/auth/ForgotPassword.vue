<script setup>
import {reactive, ref} from "vue";
import axios from "axios";
import useLogin from "@/composerables/useLogin.js";
import Swal from "sweetalert2";
import Password from "primevue/password";

const {forgot, forgotPassword} = useLogin()

const form = reactive({
  email:''
})

const isloading = ref(false)
const submit = async () => {
  if (isloading.value) return
  isloading.value=true
  await forgotPassword({...form})
  isloading.value=false
}
</script>

<template>
  <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen items-center px-6 lg:px-8  md:-ml-64 lg:gap-10">
    <div class="px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-32 w-auto rounded-full" src="../../../tsclogo.png"
             alt="Your Company"/>
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
          Forgot Password?
        </h2>
        <p class="text-gray-400 text-center">No worries, we'll send you reset instruction</p>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" @submit.prevent="submit">
          <div>
            <div class="mt-2">
              <input v-model="form.email" id="email" type="email" autocomplete="email" required=""
                     class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200"
                     placeholder="Enter your email"/>
            </div>
          </div>

          <div>
            <button type="submit" :disabled="isloading"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:opacity-70 disabled:cursor-not-allowed">
              Reset password
            </button>
          </div>
        </form>
        <div class=" mt-6  clear-end rounded-lg ">

          <div class="flex flex-col md:flex-row gap-4 justify-center mb-10 w-full">
            <router-link to="login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"/>
              </svg>
            </router-link>

          <router-link to="login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">
            Back to log in!
          </router-link>
        </div>
        </div>
      </div>
    </div>

    <div class="flex justify-center lg:justify-end px-6 py-12 lg:px-40 ">
      <img src="../../../forgotPassword.jpg" alt="Login Image"
           class="max-w-full h-auto lg:max-w-md shadow-2xl rounded-2xl"/>
    </div>
  </div>

</template>

<style scoped>

</style>