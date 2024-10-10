<script setup>
import Header from "@/layouts/user/Header.vue";
import useAdminSignup from "@/composerables/useAdminSignup.js";
import axios from "axios";
import {useRouter} from "vue-router";
import useSession from "@/composerables/useSession.js";

const {admin, confirm_password} = useAdminSignup()
const {username} = useSession()
const router = useRouter()
const register = async () => {
  try {
    if (confirm_password.value !== admin.value.password) {
      return alert("Passwords do not match")

    }

    const token = localStorage.getItem('AUTH_TOKEN')
    const config = {
      headers: {Authorization: `Bearer ${token}`}
    }
    let response = await axios.post('http://127.0.0.1:8000/api/admin_register', admin.value, config)
    await router.push('/admin_user')
  } catch (err) {
    alert(err.response.data.message)
  }
}
//   const response = await axios.post('http://127.0.0.1:8000/api/admin_register', admin.value, config)
//   await router.push('/admin_user')
// }

</script>

<template>

  <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
    <img class="rounded-full" width="80%" src="../../../tsclogo.png"
         alt="Your Company"/>
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Hello  <span class="text-blue-500">{{ username }}</span> add a new user
      here!
    </h2>
  </div>
  <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen items-center px-6  lg:px-8  lg:mr-96 ">
    <div class="px-6 lg:px-8 shadow-2xl">
    </div>
    <div class="grid">
      <div class=" max-w-md">
        <form @submit.prevent="register">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <label class="block">
              <span class="text-gray-700">First Name</span>
              <input
                  v-model="admin.first_name" type="text"
                  class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 rounded-2xl"
                  placeholder=""
              />
            </label>
            <label class="block">
              <span class="text-gray-700">Last Name</span>
              <input v-model="admin.last_name"
                     type="text"
                     class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 rounded-2xl"
                     placeholder=""
              />
            </label>
          </div>

          <div class="grid grid-cols-1 gap-4 sm:grid:cols-2">
            <label class="block">
              <span class="text-gray-700">Other Names</span>
              <input v-model="admin.other_names"
                     type="text"
                     class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 rounded-2xl"
                     placeholder=""
              />
            </label>
            <label class="block">
              <span class="text-gray-700">Email address</span>
              <input
                  v-model="admin.email"
                  type="email"
                  class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 rounded-2xl"
                  placeholder="john@example.com"
              />
            </label>
          </div>
          <div class="grid grid-cols-1 gap-4 grid-sm:grid-cols-2">
            <label class="block">
              <span class="text-gray-700">Password</span>
              <input v-model="admin.password"
                     type="password"
                     class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
              />
            </label>
            <label class="block">
              <span class="text-gray-700">Confirm Password</span>
              <input v-model="confirm_password"
                     type="password"
                     class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
              />

            </label>
          </div>
          <div class="grid grid-cols-1 gap-4 grid-sm:grid-cols-2">

            <label class="block">
              <span class="text-gray-700">Phone</span>
              <input v-model="admin.phone"
                     type="tel"
                     class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
                     placeholder=""
              />
            </label>

            <label class="block">
              <span class="text-gray-700">Country</span>
              <input
                  v-model="admin.country"
                  type="text"
                  class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
                  placeholder=""
              />
            </label>
          </div>
          <div class="grid grid-cols-1 gap-4 grid-sm:grid-cols-2">

            <label class="block">
              <span class="text-gray-700">Date of Birth Name</span>
              <input
                  v-model="admin.date_of_birth"
                  type="date"
                  class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
                  placeholder=""
              />
            </label>

            <label class="block">
              <span class="text-gray-700">Salary</span>
              <input
                  v-model="admin.salary"
                  type="number"
                  class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
                  placeholder=""
              />
            </label>
          </div>
          <div class="grid grid-cols-1 gap-4 grid-sm:grid-cols-2">

            <label class="block">
              <span class="text-gray-700">National_id </span>
              <input v-model="admin.national_id"
                     type="text"
                     class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
                     placeholder=""
              />
            </label>


            <label class="block">
              <span class="text-gray-700">User type</span>
              <select v-model="admin.user_type"
                      class="block w-full mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
              >
                <option selected disabled>Select Option</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
            </label>
          </div>
          <div class="grid grid-cols-1 gap-4 grid-sm:grid-cols-2">

            <label class="block">
              <span class="text-gray-700">Nationality</span>
              <input v-model="admin.nationality"
                     type="text"
                     class="mt-0 block w-full px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black rounded-2xl"
                     placeholder=""
              />
            </label>
          </div>

          <div class="pt-5">
            <button class="btn bg-blue-500 rounded-3xl p-2 ml-32">Register User</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>