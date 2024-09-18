<script setup>
import Header from "@/layouts/admin/Header.vue";
import useAdminSignup from "@/composerables/useAdminSignup.js";
import axios from "axios";
import {useRouter} from "vue-router";

const {user, confirm_password} = useAdminSignup
const router = useRouter()
const register = async () => {
  if (confirm_password.value !== user.value.password) {
    alert("Passwords do not match")
    return
  }

  const response = await axios.post('http://127.0.0.1:8000/api/admin_register', user.value)
  await router.push('/loan')
}
</script>

<template>
  <Header/>
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
         alt="Your Company"/>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add a new user
    </h2>
  </div>
  <div class="flex justify-center items-center">
    <div class="mt-8 max-w-md ">
      <form @submit.prevent="register">
        <div class="grid grid-cols-1 gap-6">
          <label class="block">
            <span class="text-gray-700">First Name</span>
            <input
                v-model="user.first_name" type="text"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0"
                placeholder=""
            />
          </label>

          <label class="block">
            <span class="text-gray-700">Last Name</span>
            <input v-model="user.last_name"
                type="text"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>

          <label class="block">
            <span class="text-gray-700">Other Names</span>
            <input v-model="user.other_names"
                type="text"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>
          <label class="block">
            <span class="text-gray-700">Email address</span>
            <input
                v-model="user.email"
                type="email"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder="john@example.com"
            />
          </label>
          <label class="block">
            <span class="text-gray-700">Password</span>
            <input v-model="user.password"
                type="password"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
            />
            <label class="block">
              <span class="text-gray-700">Confirm Password</span>
              <input v-model="user.confirm_password"
                  type="password"
                  class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
              />
            </label>
          </label>
          <label class="block">
            <span class="text-gray-700">Phone</span>
            <input v-model="user.phone"
                type="tel"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>

          <label class="block">
            <span class="text-gray-700">Country</span>
            <input
                v-model="user.country"
                type="text"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>

          <label class="block">
            <span class="text-gray-700">Date of Birth Name</span>
            <input
                v-model="user.date_of_birth"
                type="date"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>

          <label class="block">
            <span class="text-gray-700">Salary</span>
            <input
                v-model="user.salary"
                type="number"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>

          <label class="block">
            <span class="text-gray-700">National_id </span>
            <input v-model="user.national_id"
                type="text"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>


          <label class="block">
            <span class="text-gray-700">User type</span>
            <select v-model="user.user_type"
                class="block w-full mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
            >
              <option selected disabled>Select Option</option>
              <option value="Admin">Admin</option>
              <option value="User">Usr</option>
            </select>
          </label>

          <label class="block">
            <span class="text-gray-700">Nationality</span>
            <input v-model="user.nationality"
                type="text"
                class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                placeholder=""
            />
          </label>
        </div>
        <div class="pt-5">
          <button class="btn bg-blue-500 rounded-3xl">Register User</button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>

</style>