<script setup>

import Header from "@/layouts/user/Header.vue";
import Footer from "@/layouts/user/Footer.vue";
import useLoan from "@/composerables/useLoan.js";
import {onMounted} from "vue";


const {userloan, get_loan} = useLoan()

onMounted(get_loan)

</script>

<template>
  <Header/>
  <h3 class="text-center m-10 text-3xl font-sans">Here is a list of all your loans</h3>
  <!--    <div class="ml-96 px-52 space-x-96">-->
<!--  <div class="p-4 sm:ml-64">-->
<!--    <div class="p-4 rounded-lg">-->
      <div class="mt-6 bg-white clear-end rounded-lg">
        <table class="min-w-full rounded-3xl shadow divide-y divide-gray-200">
          <thead>
          <tr>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Loan Amount</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Purpose of Loan</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Created AT</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="(userloans) in userloan" :key="userloans.id" class="hover:bg-blue-300">
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              GHC {{userloans.amount}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ userloans.status}}
<!--                <td>{!! $record->active ? '<small class="alert alert-success"> Active </div>': '<small class="alert alert-warning">In-Active</div>' !!}</td>-->

  </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{userloans.purpose}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{userloans.created_at}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              Delete
            </td>
          </tr>
          </tbody>
        </table>
      </div>
<!--    </div>-->
<!--  </div>-->

<!--    </div>-->


  <Footer/>
</template>

<style scoped>

</style>