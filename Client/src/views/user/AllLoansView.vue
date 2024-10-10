<script setup>

import Header from "@/layouts/user/Header.vue";
import Footer from "@/layouts/user/Footer.vue";
import useLoan from "@/composerables/useLoan.js";
import {onMounted} from "vue";
import LoanStatus from "@/components/LoanStatus.vue";
import TableHeader from "@/components/TableHeader.vue";
import TruncatableParagraph from "@/components/TruncatableParagraph.vue";


const {userloan, get_loan} = useLoan()

onMounted(get_loan)
const headers = [
    "Loan Amount",
    "Amount Remaining",
    "Monthly Payment",
    "Status",
    "Purpose of Loan",
    "Loan details",
    "Created at"
]

</script>

<template>
  <Header/>
<section class="md:ml-64 p-10 h-screen">
  <h3 class="text-center text-3xl font-sans">Here is a list of all your loans</h3>
  <!--    <div class="ml-96 px-52 space-x-96">-->
  <!--  <div class="p-4 sm:ml-64">-->
  <!--    <div class="p-4 rounded-lg">-->
  <div class="mt-6 clear-end rounded-lg w-full overflow-x-auto">
    <table class=" w-full rounded-3xl shadow divide-y divide-gray-200">
      <thead>
      <tr class="text-left">
        <th v-for="header in headers" :key="header" class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">{{ header }}</th>
      </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
      <tr v-for="(loan) in userloan" :key="loan.id" class="text-left">
        <td class="px-3 py-2 whitespace-nowrap text-sm font-medium">
          GHC {{ loan.amount }}
        </td>

        <td class="px-3 py-2 whitespace-nowrap text-sm font-medium">
          GHC {{ loan.amount - loan.amount_remaining }}
        </td>
        <td class="px-3 py-2 whitespace-nowrap text-sm font-medium">
          GHC {{ loan.monthly_payment }}
        </td>
        <td class="px-3 py-2 whitespace-nowrap  text-sm font-medium">
          <LoanStatus :status="loan.status"/>
        </td>
        <td class="px-3 py-2 whitespace-nowrap  text-xs font-medium">
<!--          loan.purpose.length > 25 ? loan.purpose.slice(0, 25)+'...' : loan.purpose-->
          <div class="w-full max-w-64 text-wrap">
            <TruncatableParagraph :text="loan.purpose" v-if="loan.purpose.length > 25" />
<!--            <p @click v-if="loan.purpose.length > 25">{{ loan.purpose.slice(0, 25)+"..." }}</p>-->
            <p v-else>{{ loan.purpose }}</p>
          </div>
        </td>
        <td class="px-3 py-2 whitespace-nowrap  text-sm font-medium">
          <p><router-link :to="{name: 'user_loan.details'}">
            <span class="bg-emerald-200 p-2 rounded">View loan Details</span>
          </router-link></p>
        </td>
        <td class="px-3 py-2 whitespace-nowrap text-sm font-medium">
          {{ loan.created_at }}
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</section>



</template>

<style scoped>

</style>