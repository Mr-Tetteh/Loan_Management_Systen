<script setup>
import {onMounted, ref} from "vue";
import usePayments from "@/composerables/usePayments.js";
import router from "@/router/index.js";

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
</script>

<template>

  <div class="p-8 bg-gray-50 shadow-lg rounded-lg">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-4 bg-blue-100 p-4 rounded-lg">
      <h2 class="text-2xl font-semibold text-blue-800">Invoice</h2>
    </div>
{{props}}
    <!-- Invoice Info Section -->
    <div class="flex justify-between items-center border-b pb-4 mb-4 bg-blue-50 p-4 rounded-lg">
      <div>
        <h1 class="text-xl font-bold text-blue-700 mr-2">#1043</h1>
        <p class="text-gray-600">July 17, 2020 at 3:28 am</p>
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
    <div class="flex justify-between border-b pb-4 mb-4 bg-blue-50 p-4 rounded-lg">
      <div>
        <h2 class="text-xl font-semibold text-blue-700">Invoice To:</h2>
        <p class="text-gray-600">{{payment.first_name}}</p>
      </div>
      <div class="space-y-2 text-blue-700">
        <div class="flex justify-between items-center">
          <p>Invoice#</p>
          <span class="font-bold">#1200</span>
        </div>
        <div class="flex justify-between items-center">
          <p>Date</p>
          <span>12/12/2022</span>
        </div>
        <div class="flex justify-between items-center">
          <p>Due Date</p>
          <span>12/12/2022</span>
        </div>
        <div class="flex justify-between items-center">
          <p>Reference</p>
          <span>1045</span>
        </div>
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
        <p>Daniel Nii Ayitey Tetteh</p>
        <p>Buy ipad</p>
        <p>20000</p>
        <p>GHC 700</p>
        <p>GHC 4000</p>
        <p>0244544661</p>
        <p>20-3-24</p>
      </div>
    </div>

    <!-- Subtotal and Thank You Section -->
    <div class="flex justify-between items-center py-4 border-b mb-10 bg-blue-50 p-4 rounded-lg">
      <h2 class="text-xl font-semibold text-blue-700">Thank you for paying</h2>
      <div class="space-y-2 mb-10">
        <div class="flex justify-between items-center text-blue-700">
          <p>Amount Paid</p>
          <span class="font-bold">$1200</span>
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