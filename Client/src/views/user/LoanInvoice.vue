<script setup>
import {onMounted, ref} from "vue";
import usePayments from "@/composerables/usePayments.js";
import router from "@/router/index.js";
import {timestamp} from "@antfu/utils";

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
  router.push('/user_loan').catch(() => {})
}

const currentDateTime = ref(new Date().toLocaleString())

</script>

<template>

  <div class="p-8 bg-gray-50 shadow-lg rounded-lg">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-4 bg-blue-100 p-4 rounded-lg">
      <h2 class="text-2xl font-semibold text-blue-800">Invoice</h2>
    </div>

    <!-- Invoice Info Section -->
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

    <!-- Logo and Invoice Title -->
    <div class="flex justify-between items-center py-4 border-b mb-4 bg-yellow-600 p-4 rounded-lg">
      <div>
        <img src="#" alt="Logo" class="w-48 mb-4">
        <p class="text-gray-600 ml-96 px-96 text-xl font-bold">INVOICE</p>
      </div>
    </div>

    <!-- Invoice Details -->
    <div class="flex justify-center border-b pb-4 mb-4 bg-blue-50 p-4 rounded-lg">
      <div>
        <h2 class="text-xl font-semibold text-blue-700">Invoice To:</h2>
        <p class="text-gray-600">{{payment.first_name}} {{payment.other_names}} {{payment.last_name}}</p>
      </div>
    </div>

    <!-- Item Table -->
    <div class="w-full border-b py-4 mb-4 bg-white p-4 rounded-lg">
      <div class="flex justify-between font-bold text-gray-600 border-b pb-2">
        <p>#</p>
        <p>Name </p>
        <p>Purpose of Loan</p>
        <p>Loan Amount</p>
        <p>Amount Paid</p>
        <p>Amount Remaining</p>
        <p>Phone</p>
        <p>Date</p>
      </div>

      <!-- Items -->
      <div class="flex justify-between border-b py-2 text-gray-700">
        <p>1</p>
        <p>{{ payment.first_name }}   {{payment.other_names}}   {{payment.last_name}}</p>
        <p>{{payment.purpose}}</p>
        <p>GHC {{payment.amount}}</p>
        <p>GHC {{ payment.amount_to_pay }}</p>
        <p>GHC 1000</p>
        <p>{{ payment.phone }}</p>
        <p>{{payment.date}}</p>
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
          <span>$100</span>
        </div>
      </div>
    </div>

<!--    &lt;!&ndash; Grand Total and Terms Section &ndash;&gt;-->
<!--    <div class="flex justify-between items-center py-4 bg-blue-100 p-4 rounded-lg">-->
<!--      <div>-->
<!--        <h2 class="text-xl font-semibold text-blue-800">Terms and Conditions</h2>-->
<!--        <p class="text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
<!--      </div>-->
<!--      <div>-->
<!--        <div class="flex justify-between items-center text-blue-800 font-bold text-xl">-->
<!--          <p>Grand Total</p>-->
<!--          <span>$1100</span>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->

    <!-- Footer Section -->

  </div>

  <br><br><br></template>

<style scoped>

</style>