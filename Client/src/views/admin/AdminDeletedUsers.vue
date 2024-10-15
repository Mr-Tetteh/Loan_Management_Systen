<script setup>
import Header from "@/layouts/user/Header.vue";
import {ChevronDownIcon} from "@heroicons/vue/20/solid/index.js";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import TableHeader from "@/components/TableHeader.vue";
import useAdminSignup from "@/composerables/useAdminSignup.js";
import {onMounted, ref} from "vue";


const {users, destoryuser, restoreUser, restoreuser, get_deleted_users, get_users} = useAdminSignup()

onMounted(get_deleted_users)

const isOpen = ref(null)

function closeModal() {
  isOpen.value = null
}

</script>

<template>
  <Header/>

  <h3 class="text-3xl text-center p-2">List of all deleted Users </h3>

  <div class="p-4 rounded-lg">
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
      <tbody v-for="user in users" :key="user.id" class="bg-white divide-y divide-gray-200">
      <tr>
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
          {{ user.created_at }}
        </td>


        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          <Menu as="div" class="relative inline-block text-left">
            <MenuButton
                class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
              Actions
              <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400" aria-hidden="true"/>
            </MenuButton>

            <transition enter-active-class="transition ease-out duration-100"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95">
              <MenuItems
                  class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">

                <!-- Edit User Item -->
                <router-link :to="{name: 'user.edit', params: {id: user.id}}">
                  <MenuItem v-slot="{ active }">
                    <a href="#" class="bg-blue-200 block px-4 py-2 text-sm flex items-center space-x-3">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                      </svg>
                      <span>Edit User</span>
                    </a>
                  </MenuItem>
                </router-link>

                <!-- User Details Item -->
                <MenuItem @click="isOpen = user" v-slot="{ active }">
                  <a href="#" class="bg-emerald-200 block px-4 py-2 text-sm flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <span>User Details</span>
                  </a>
                </MenuItem>

                <!-- Restore User Item -->
                <MenuItem v-slot="{ active }">
                  <button @click="restoreUser(user.id)"
                          class="bg-yellow-200 block px-4 py-2 text-sm flex items-center space-x-3 w-full text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"/>
                    </svg>
                    <span>Restore User</span>
                  </button>
                </MenuItem>
              </MenuItems>
            </transition>
          </Menu>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>

</style>