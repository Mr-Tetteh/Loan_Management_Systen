<script setup>
import {onMounted, ref} from "vue";
import usePayments from "@/composerables/usePayments.js";
import router from "@/router/index.js";
import {timestamp} from "@antfu/utils";
import Header from "@/layouts/user/Header.vue";

const {payment, get_payment} = usePayments()
const props =  defineProps({
  id: {
    String,
    required: true
  }
})
onMounted(() => get_payment(props.id))

const print = () =>{
  window.print()
  router.push('/all_loans').catch(() => {})
}

const currentDateTime = ref(new Date().toLocaleString())

</script>

<template>
  <Header/>

  <div class="p-8 bg-gray-50 shadow-lg rounded-lg">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-4 bg-blue-100 p-4 rounded-lg">
      <h2 class="text-2xl font-semibold text-blue-800">Receipt</h2>
    </div>

    <div class="flex justify-between items-center border-b pb-4 mb-4 bg-blue-50 p-4 rounded-lg">
      <div>
        <p class="text-gray-600">{{currentDateTime}}</p>
      </div>
      <ul class="flex space-x-4">
        <li>
          <button class="px-4 py-2 bg-blue-200 text-blue-800 rounded-lg hover:bg-blue-300" @click="print()">
            <i class="fas fa-print"></i> Print
          </button>
        </li>
      </ul>
    </div>

    <div class="flex flex-col md:flex-row justify-center items-center py-4 border-b mb-4 bg-yellow-600 p-4 rounded-lg">
      <div class="flex flex-col items-center md:items-start">
        <img src="../../../tsclogo.png" alt="Logo"  width="70px" class="rounded-2xl">
        <p class="text-gray-600  text-xl font-bold">Receipt</p>
      </div>
    </div>

    <div class="flex justify-center border-b pb-4 mb-4 bg-blue-50 p-4 rounded-lg">
      <div>
        <h2 class="text-xl font-semibold text-blue-700">Receipt To:</h2>
        <p class="text-gray-600">{{payment.first_name}} {{payment.other_names}} {{payment.last_name}}</p>
      </div>
    </div>

    <div class="w-full border-b mb-4 bg-white p-4 rounded-lg">
      <div class="overflow-x-auto">
        <table border="10px" class="min-w-full table-auto">
          <thead>
          <tr class="font-bold text-gray-600 border-b">
            <th class="p-5 text-left">#</th>
            <th class="p-5 text-left">Name</th>
            <th colspan="3" class="p-5 text-left">Purpose of Loan</th>
            <th class="p-5 text-left">Loan Amount</th>
            <th class="p-5 text-left">Amount Paid</th>
            <th class="p-5 text-left">Amount Remaining</th>
            <th class="p-5 text-left">Salary For The Month</th>
            <th class="p-5 text-left">Phone</th>
            <th class="p-5 text-left">Date</th>
          </tr>
          </thead>
          <tbody>
          <tr class="border-b text-gray-700">
            <td class="p-5 text-left">1</td>
            <td class="p-5 text-left">{{ payment.first_name }} {{ payment.other_names }} {{ payment.last_name }}</td>
            <td colspan="3" class="p-5 text-left">{{ payment.purpose }}</td>
            <td class="p-5 text-left">GHC {{ payment.amount }}</td>
            <td class="p-5 text-left">GHC {{ payment.amount_to_pay }}</td>
            <td class="p-5 text-left">GHC {{ payment.amount_remaining }}</td>
            <td class="p-5 text-left">GHC {{ payment.salary_for_the_month }}</td>
            <td class="p-5 text-left">{{ payment.phone }}</td>
            <td class="p-5 text-left">{{ payment.date }}</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>


    <!-- Subtotal and Thank You Section -->
    <div class="flex justify-between items-center py-4 border-b mb-10 bg-blue-50 p-4 rounded-lg">
      <h2 class="text-xl font-semibold text-blue-700">Thank you for paying</h2>
      <div class="space-y-2 mb-10">
        <div class="flex justify-between items-center text-blue-700">
          <p>Amount Paid</p>
          <span class="font-bold">GHC {{payment.amount_to_pay}}</span>
        </div>
        <div class="flex justify-between items-center text-blue-700">
          <p>Amount Remaining</p>
          <span class="ml-2">  GHC {{payment.amount_remaining}}</span>
        </div>
      </div>
    </div>
    <!-- Footer Section -->

  </div>

  <br><br><br></template>

<style scoped>

.container {
  max-width: 1024px;
}

table, th, td {
  border-collapse: collapse;
}

</style>