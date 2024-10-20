<script setup>

import Header from "@/layouts/user/Header.vue";
import UserType from "@/components/UserType.vue";
import TableHeader from "@/components/TableHeader.vue";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import AdminUserDetails from "@/views/admin/AdminUserDetails.vue";
import {ChevronDownIcon} from "@heroicons/vue/20/solid/index.js";
import usePayments from "@/composerables/usePayments.js";
import {onMounted} from "vue";
import {useRoute} from "vue-router";
import TruncatableParagraph from "@/components/TruncatableParagraph.vue";


const {payments,payment_history} = usePayments()
const props = defineProps({
  id:{
    type:String,
    required:true
  }
})
const route = useRoute()

onMounted(() => payment_history (props.id)
);
</script>

<template>
<Header/>
  <div class="p-4 rounded-lg">
    <div class="mt-6 bg-white clear-end rounded-lg">
      <h2 class="text-2xl">Users Loan Payment history</h2>
      <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
        <thead>
        <tr>
          <TableHeader title="Full Name"/>
          <TableHeader title="Email"/>
          <TableHeader title="Loan Amount"/>
          <TableHeader title="Purpose"/>
          <TableHeader title="amount_to_pay"/>
          <TableHeader title="Amount Remaining"/>
          <TableHeader title="Salary for the month"/>
          <TableHeader title="Date"/>
        </tr>
        </thead>
        <tbody v-for="(payment) in payments" :key="payment.id" class="bg-white divide-y divide-gray-200">
        <tr >
          <td class="px-6 py-4 whitespace-nowrap flex items-center">
            <div>
              <div class="text-sm font-medium text-gray-900">{{ payment.first_name }} {{ payment.other_names }}
                {{ payment.last_name }}
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

          </td>
          <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
            {{ payment.amount }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
            <div class="w-full max-w-64 text-wrap">

            <TruncatableParagraph :text="payment.purpose" v-if="payment.purpose > 25"/>

            <p v-else>{{payment.purpose}}</p>
            </div>
          </td>

          <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
            {{payment.amount_to_pay}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
            {{ payment.amount_remaining }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
            {{payment.salary_for_the_month}}
          </td>

          <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
            {{payment.created_at}}
          </td>



          <!--          <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">-->
<!--            <Menu as="div" class="relative inline-block text-left">-->
<!--              <div>-->
<!--                <MenuButton-->
<!--                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">-->
<!--                  Actions-->
<!--                  <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400" aria-hidden="true"/>-->
<!--                </MenuButton>-->
<!--              </div>-->

<!--              <transition enter-active-class="transition ease-out duration-100"-->
<!--                          enter-from-class="transform opacity-0 scale-95"-->
<!--                          enter-to-class="transform opacity-100 scale-100"-->
<!--                          leave-active-class="transition ease-in duration-75"-->
<!--                          leave-from-class="transform opacity-100 scale-100"-->
<!--                          leave-to-class="transform opacity-0 scale-95">-->
<!--                <MenuItems-->
<!--                    class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">-->
<!--                  <div class="py-1">-->
<!--                    <router-link :to="{name: 'user.edit', params: {id: user.id}}">-->
<!--                      <MenuItem v-slot="{ active }">-->
<!--                        <a href="#" class="flex items-center bg-blue-200 text-gray-700 w-full h-12 px-4 py-2 text-sm">-->
<!--                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                               stroke-width="1.5" stroke="currentColor" class="h-5 w-5">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>-->
<!--                          </svg>-->
<!--                          <span class="ml-3 text-base">Edit User</span>-->
<!--                        </a>-->
<!--                      </MenuItem>-->
<!--                    </router-link>-->

<!--                    <MenuItem @click="isOpen = user" v-slot="{ active }">-->
<!--                      <a href="#" class="flex items-center bg-emerald-200 text-gray-700 w-full h-12 px-4 py-2 text-sm">-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"-->
<!--                             stroke="currentColor" class="h-5 w-5">-->
<!--                          <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>-->
<!--                          <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>-->
<!--                        </svg>-->
<!--                        <span class="ml-3 text-base">User Details</span>-->
<!--                      </a>-->
<!--                    </MenuItem>-->

<!--                    <MenuItem v-slot="{ active }">-->
<!--                      <button @click="deleteuser(user.id)" class="flex items-center bg-red-200 text-gray-900 w-full h-12 px-4 py-2 text-sm">-->
<!--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                             stroke-width="1.5" stroke="currentColor" class="h-5 w-5">-->
<!--                          <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>-->
<!--                        </svg>-->
<!--                        <span class="ml-3 text-base">Delete</span>-->
<!--                      </button>-->
<!--                    </MenuItem>-->
<!--                  </div>-->
<!--                </MenuItems>-->
<!--              </transition>-->
<!--            </Menu>-->
<!--          </td>-->
        </tr>
        </tbody>
      </table>
    </div>
<!--    <AdminUserDetails v-if="isOpen"  :user="isOpen" :close-modal="closeModal"/>-->

  </div>

</template>

<style scoped>

</style>