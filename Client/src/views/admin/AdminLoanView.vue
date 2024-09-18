<script setup>
import useLoan from "@/composerables/useLoan.js";
import {ref, onMounted} from "vue";
import axios from "axios";
import Header from "@/layouts/admin/Header.vue";

const {loans, get_loans} = useLoan()

onMounted(get_loans)
</script>

<template>
  <Header/>
  <div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg">
      <div class="mt-6 bg-white clear-end rounded-lg">
        <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
          <thead>
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Other Names
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Loan Amount
              Number
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Purpose of Loan
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telephone Number</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">National_id</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created AT</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(loan) in  loans" :key="loans.id">
            <td class="px-6 py-4 whitespace-nowrap flex items-center">
              <div>
                <div class="text-sm font-medium text-gray-900">{{loan.first_name }}</div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">Tetteh</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              Nii Ayitey
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              danielsatu73@gmail.com
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              GHC {{loan.amount}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              {{loan.status}}
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ loan.purpose }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              0574832324
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
             Ghana
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              2000
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
          GH-21423erefd
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              Edit
              Delete
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              20-12-12
            </td>
          </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>


</template>

<style scoped>

</style>
