<script setup>

import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import {ChevronDownIcon} from '@heroicons/vue/20/solid'
import LoanStatus from "@/components/LoanStatus.vue";
import TableHeader from "@/components/TableHeader.vue";
import AdminLoanDetails from "@/views/admin/AdminLoanDetails.vue";
import useLoan from "@/composerables/useLoan.js";
import {ref, onMounted} from "vue";
import axios from "axios";
import Header from "@/layouts/user/Header.vue";

const {loans, get_pending_loans, deleteloan} = useLoan()
onMounted(get_pending_loans)

const isOpen = ref(null)

function closeModal() {
  isOpen.value = null
}


</script>

<template>

    <h2 class="text-2xl ml-96">List of all Pending Loans</h2>

    <div class="p-4 rounded-lg">
      <div class="mt-6 bg-white clear-end rounded-lg">
        <router-link to="admin_loan" class=" p-2 ">
          <span class=" bg-blue-500 text-white rounded hover:bg-gray-700 sm: m-5 p-3">View All Loans Records</span>
        </router-link>

        <router-link to="admin_completed_loan" class=" p-2"><span
            class="bg-cyan-500 text-white rounded hover:bg-gray-700 sm: m-5 float-end p-3">View All completed Loans Records</span>
        </router-link>
        <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
          <thead>
          <tr>
            <TableHeader title="Name"/>
            <TableHeader title="Email"/>
            <TableHeader title="Loan Status"/>
            <TableHeader title="Loan Amount"/>
            <TableHeader title="Created At"/>
            <TableHeader title="Actions"/>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(loan) in  loans" :key="loans.id">
            <td class="px-6 py-4 whitespace-nowrap flex items-center">
              <div>
                <div class="text-sm font-medium text-gray-900">{{ loan.first_name }} {{ loan.other_names }}
                  {{ loan.last_name }}
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ loan.email }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <LoanStatus :status="loan.status"/>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              GHC {{ loan.amount }}
            </td>

            <!--            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">-->
            <!--              &lt;!&ndash;                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">&ndash;&gt;-->
            <!--              &lt;!&ndash;                 {{ loan.status }}&ndash;&gt;-->
            <!--              &lt;!&ndash;              </span>&ndash;&gt;-->
            <!--              <LoanStatus :status="loan.status"/>-->
            <!--            </td>-->
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ loan.created_at }}
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
                      <router-link :to="{name: 'loan.edit', params: {id: loan.id}}">
                        <MenuItem v-slot="{ active }">
                          <a href="#"
                             class="bg-blue-200 text-gray-700 flex items-center justify-between w-full px-4 py-2 text-sm">
                            <div class="flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                   stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                              </svg>
                              <span class="ml-3 text-base">Loan Approval</span>
                            </div>
                          </a>
                        </MenuItem>
                      </router-link>

                      <router-link :to="{name: 'payment.payment', params: {id: loan.id}}">
                        <MenuItem v-if="loan.status === 'approved'" v-slot="{ active }">
                          <div
                              class="bg-amber-200 text-gray-700 flex items-center justify-between w-full px-4 py-2 text-sm">
                            <div class="flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                   stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"/>
                              </svg>
                              <span class="ml-3 text-base">Monthly Deduction</span>
                            </div>
                          </div>
                        </MenuItem>
                      </router-link>

                      <MenuItem @click="isOpen = loan" v-slot="{ active }">
                        <a href="#"
                           class="bg-emerald-200 text-gray-700 flex items-center justify-between w-full px-4 py-2 text-sm">
                          <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="h-5 w-5">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                            <span class="ml-3 text-base">Loan Details</span>
                          </div>
                        </a>
                      </MenuItem>

                      <MenuItem v-slot="{ active }">
                        <button @click="deleteloan(loan.id)"
                                class="bg-red-200 text-gray-900 flex items-center justify-between w-full px-4 py-2 text-sm">
                          <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="h-5 w-5">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                            </svg>
                            <span class="ml-3 text-base">Delete</span>
                          </div>
                        </button>
                      </MenuItem>

                    </div>
                  </MenuItems>
                </transition>
              </Menu>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
      <AdminLoanDetails v-if="isOpen" :loan="isOpen" :close-modal="closeModal"/>

    </div>


</template>

<style scoped>

</style>
