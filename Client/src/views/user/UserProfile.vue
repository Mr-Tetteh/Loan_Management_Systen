<script setup>

import useAdminSignup from "@/composerables/useAdminSignup.js";
import {onMounted, ref} from "vue";
import Header from "@/layouts/user/Header.vue"
import Swal from "sweetalert2";

const {user, update_user,confirm_password,new_password,old_password, update_user_password,updated_user_profile, get_user} = useAdminSignup()

const props = defineProps({
  id: {
    type: String,
    required: true
  }
})
const editUser = async () => {
  await updated_user_profile(props.id)

}

const  update_password = async () =>{
  if (new_password.value !== confirm_password.value){
    await Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "New Password and Confirm Password do not match",
    });
  }else {
    await update_user_password(props.id)

  }
}
onMounted(() => get_user(props.id))
</script>

<template>
  <Header/>

  <div class="p-4 rounded-lg">
    <div class="mt-6 bg-white clear-end rounded-lg shadow shadow-cyan-600 p-10">
      <div class="lg:px-96 lg:ml-20 ">
        <h2 class=" text-3xl ">Your Profile</h2>
      </div>
      <form @submit.prevent="editUser">
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                <div class="mt-2">
                  <input v-model="user.first_name" type="text" name="first-name" id="first-name"
                         autocomplete="given-name"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                <div class="mt-2">
                  <input v-model="user.last_name" type="text" name="last-name" id="last-name"
                         autocomplete="family-name"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="other-name" class="block text-sm font-medium leading-6 text-gray-900">Other name</label>
                <div class="mt-2">
                  <input v-model="user.other_names" type="text" id="other-name" autocomplete="family-name"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>

              <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
                <div class="mt-2">
                  <input v-model="user.email" type="email" name="email" id="last-name" autocomplete="family-name"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>


              <div class="sm:col-span-2">
                <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Telephone Number</label>
                <div class="mt-2">
                  <input v-model="user.phone" type="tel" name="region" id="region" autocomplete="address-level1"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Country
                </label>
                <div class="mt-2">
                  <input v-model="user.country" type="text" name="postal-code" id="postal-code"
                         autocomplete="postal-code"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>


              <div class="sm:col-span-2">
                <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary
                </label>
                <div class="mt-2">
                  <input v-model="user.salary" type="number" id="postal-code" autocomplete="postal-code"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>


              <div class="sm:col-span-2">
                <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Nationality
                </label>
                <div class="mt-2">
                  <input v-model="user.nationality" type="text" id="postal-code" autocomplete="postal-code"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">National ID
                </label>
                <div class="mt-2">
                  <input v-model="user.national_id" type="text" id="national_id" autocomplete="postal-code"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>

              <div class="sm:col-span-2">
                <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Date of Birth
                </label>
                <div class="mt-2">
                  <input v-model="user.date_of_birth" type="date" id="national_id" autocomplete="postal-code"
                         class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="submit"
                  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>


  <form @submit.prevent="update_password">
    <div class="p-4 rounded-lg">
      <div class="mt-6 bg-white clear-end rounded-lg shadow shadow-cyan-600 p-10">
        <div class="lg:px-96  ">
          <h3 class="text-3xl  mb-10">
            Update Your password
          </h3>
        </div>
        <div class="sm:col-span-2">
          <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Enter Old Password</label>
          <div class="mt-2">
            <input v-model=" old_password" type="password" name="region" id="region" autocomplete="address-level1"
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Enter New Password</label>
          <div class="mt-2">
            <input v-model="new_password" type="password" name="region" id="region" autocomplete="address-level1"
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
          <div class="mt-2">
            <input v-model="confirm_password" type="password" name="region" id="region"
                   autocomplete="address-level1"
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
          </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="submit"
                  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Save
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<style scoped>

</style>