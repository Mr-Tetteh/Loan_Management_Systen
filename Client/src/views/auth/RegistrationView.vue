<script setup>
import useSignup from "@/composerables/useSignup.js";
import axios from "axios";
import {useRouter} from "vue-router";
import Header from "@/layouts/user/Header.vue";


const {user, confirm_password} = useSignup()
const router = useRouter()


const register = async () => {

  try {
    if (confirm_password.value !== user.value.password) {
      alert("Passwords do not match")
      return
    }

    let response = await axios.post('http://127.0.0.1:8000/api/register', user.value)
    await router.push('/login')
  } catch (err) {
    alert(err.response.data.message)
  }

}
</script>

<template>

    <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen items-center px-6 lg:px-8  md:-ml-64 lg:gap-10">
      <div>
        <img class="rounded-2xl" src="../../../Registering.jpg" alt="">
      </div>
      <div class="mt-10">

        <div class=" mx-auto  w-full max-w-sm">
          <img class="mx-auto rounded-full" width="40%" src="../../../tsclogo.png"
               alt="Your Company"/>
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign Up Now!
          </h2>
        </div>

        <form class="space-y-6  w-full" @submit.prevent="register">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 ">
            <div>
              <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
              <div class="mt-2">
                <input v-model="user.first_name" id="first_name" type="text" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>

            <div>
              <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
              <div class="mt-2">
                <input v-model="user.last_name" id="last_name" type="text" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="other_names" class="block text-sm font-medium leading-6 text-gray-900">Other Names</label>
              <div class="mt-2">
                <input v-model="user.other_names" id="other_names" type="text"
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>

            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
              <div class="mt-2">
                <input v-model="user.email" id="email" name="email" type="email" autocomplete="email" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input v-model="user.password" id="password" name="password" type="password"
                       autocomplete="current-password" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>

            <div>
              <label for="confirm_password" class="block text-sm font-medium leading-6 text-gray-900">Confirm
                Password</label>
              <div class="mt-2">
                <input v-model="confirm_password" id="confirm_password" name="password" type="password"
                       autocomplete="current-password" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
              <div class="mt-2">
                <input v-model="user.phone" id="phone" type="tel" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>

            <div>
              <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
              <div class="mt-2">
                <input v-model="user.country" id="country" type="text" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="DOB" class="block text-sm font-medium leading-6 text-gray-900">Date of Birth</label>
              <div class="mt-2">
                <input v-model="user.date_of_birth" id="DOB" type="date" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>

            <div>
              <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
              <div class="mt-2">
                <input v-model="user.salary" id="salary" type="text" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="ghana_card" class="block text-sm font-medium leading-6 text-gray-900">GhanaCard ID</label>
              <div class="mt-2">
                <input v-model="user.national_id" id="ghana_card" type="text" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>

            <div>
              <label for="nationality" class="block text-sm font-medium leading-6 text-gray-900">Nationality</label>
              <div class="mt-2">
                <input v-model="user.nationality" id="nationality" type="text" required=""
                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
              </div>
            </div>
          </div>

          <div>
            <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Sign up
            </button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
          Already a buddy??
          <router-link to="login"><a class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500"> Login</a>
          </router-link>
        </p>

      </div>
    </div>
</template>

<style scoped>

</style>