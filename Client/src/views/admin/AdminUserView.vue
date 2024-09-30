<script setup>

import Header from "@/layouts/admin/Header.vue";
import useAdminSignup from "@/composerables/useAdminSignup.js";
import {onMounted, ref} from "vue";
import TableHeader from "@/components/TableHeader.vue";
import {ChevronDownIcon} from "@heroicons/vue/20/solid/index.js";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import AdminLoanDetails from "@/views/admin/AdminLoanDetails.vue";
import AdminUserDetails from "@/views/admin/AdminUserDetails.vue";


const {users, destoryuser, get_users} = useAdminSignup()

onMounted(get_users)

const isOpen = ref(false)

function closeModal() {
  isOpen.value = false
}

function openModal() {
  isOpen.value = true
}


</script>

<template>
  <Header/>

  <!--  <div class="p-4 mr-80">-->
  <!--    <div class="p-4 rounded-lg">-->
  <!--      <div class="container mx-auto my-8">-->
  <!--        <div class="flex justify-between items-center">-->
  <!--          <h2 class="text-3xl font-semibold">Users</h2>-->
  <!--        </div>-->
  <!--        <div class="mt-6 bg-white clear-end rounded-lg">-->

  <div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg">
      <div class="mt-6 bg-white clear-end rounded-lg">
        <router-link to="admin_add_user">
          <button
              class="bg-purple-600 text-white rounded hover:bg-purple-700 sm: m-5">
            Add User
          </button>
        </router-link>
        <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
          <thead>
          <tr>
            <TableHeader title="Full Name"/>
            <TableHeader title="Email"/>
            <TableHeader title="Telephone Number"/>
            <TableHeader title="User Type"/>
            <TableHeader title="Created At"/>

            <TableHeader title="Actions"/>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="user in users" :key="users.id">
            <td class="px-6 py-4 whitespace-nowrap flex items-center">
              <div>
                <div class="text-sm font-medium text-gray-900">{{ user.first_name }} {{ user.other_names }}
                  {{ user.last_name }}
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ user.email }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ user.phone }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              {{ user.user_type }}
              </span>
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              20-12-12
            </td>


            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <Menu as="div" class="relative inline-block text-left">
                <div>
                  <MenuButton
                      class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    Actions
                    <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400" aria-hidden="true"/>
                  </MenuButton>
                </div>

                <transition enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95">
                  <MenuItems
                      class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                      <router-link :to="{name: 'user.edit', params: {id: user.id}}">
                        <MenuItem v-slot="{ active }">
                          <a href="#" class='bg-blue-200 text-gray-700 block px-4 py-2 text-sm'>
                            <div class="flex ">
                              <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="size-5">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                </svg>
                              </div>
                              <div class="ml-3 text-base">Edit User</div>
                            </div>
                          </a>
                        </MenuItem>
                      </router-link>

                      <MenuItem @click="openModal" v-slot="{ active }">
                        <a href="#" class='bg-emerald-200 text-gray-700 block px-4 py-2 text-sm'>
                          <div class="flex ">
                            <div>
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                   stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                              </svg>

                            </div>
                            <div class="ml-3 text-base">User Details</div>
                          </div>
                        </a>
                      </MenuItem>


                      <MenuItem v-slot="{ active }">
                        <button @click="destoryuser(user.id)" class='bg-red-200 text-gray-900  px-4 py-2 text-sm'>
                          <div class="flex ">
                            <div>
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                   stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                              </svg>
                            </div>
                            <div class="ml-3 text-base">Delete</div>

                          </div>
                        </button>
                      </MenuItem>

                    </div>
                  </MenuItems>
                </transition>
              </Menu>

            </td>
            <AdminUserDetails :id="user.id" :is-open="isOpen" :close-modal="closeModal"/>

          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<style scoped>
.container {
  max-width: 1024px;
}
</style>