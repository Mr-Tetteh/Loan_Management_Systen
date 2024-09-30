<script setup>
import axios from "axios";
import Header from "@/layouts/user/Header.vue";
import useLogin from "@/composerables/useLogin.js";
import {useRouter} from "vue-router";

const {login_user, password} = useLogin()
const router = useRouter()
const login = async () => {
  // if (password.value !== login_user.value.password){
  //   alert("Invalid credentials")
  // }
  // await axios.post('http://127.0.0.1:8000/api/login', {email: 'danielstay73@gmail.com', password: '123456789'})
  const response = await axios.post('http://127.0.0.1:8000/api/login', login_user.value)
  const token = response.data.authorisation.token
  localStorage.setItem("AUTH_TOKEN", token)
  await router.push('/loan')
}


</script>
<template>
  <div class="bg-fuchsia-100 grid grid-cols-1 lg:grid-cols-2 min-h-screen items-center px-6 py-12 lg:px-8">
    <!-- Left Column: Form -->
    <div class="px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
             alt="Your Company" />
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
          Sign in to your account
        </h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" @submit.prevent="login">
          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
              <input v-model="login_user.email" id="email" type="email" autocomplete="email" required=""
                     class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="text-sm">
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
              </div>
            </div>
            <div class="mt-2">
              <input v-model="login_user.password" id="password" type="password" autocomplete="current-password"
                     required=""
                     class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
          </div>

          <div>
            <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Sign in
            </button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
          Not a member?
          <router-link to="register"><a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register Now!</a></router-link>
        </p>
      </div>
    </div>

    <!-- Right Column: Image -->
    <div class="flex justify-center lg:justify-end px-6 py-12 lg:px-40 ">
      <img src="../../../login_image.jpg" alt="Login Image" class="max-w-full h-auto lg:max-w-md shadow-2xl rounded-2xl" />
    </div>
  </div>
</template>

<style scoped>

</style>