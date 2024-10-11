<script setup>
import Header from "@/layouts/user/Header.vue";
import {Menu, MenuButton, MenuItem, MenuItems, SwitchGroup} from "@headlessui/vue";
import usePayments from "@/composerables/usePayments.js";
import {onMounted} from "vue";
import {ChevronDownIcon} from "@heroicons/vue/20/solid/index.js";
import TableHeader from "@/components/TableHeader.vue";
import LoanStatus from "@/components/LoanStatus.vue";
import router from "@/router/index.js";


const {payments, all_loan_payments} = usePayments()
onMounted(all_loan_payments)



</script>

<template>

    <div class="rounded-lg">
      <p class="text-3xl text-center sm:ml-52">Here is a list of all your loan payments</p>
      <div class="mt-6 bg-white clear-end rounded-lg p-10">
        <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
          <thead>
          <tr>
            <TableHeader title="Full Name"/>
            <TableHeader title="Email"/>
            <TableHeader title="Loan Amount"/>
            <TableHeader title="Loan Status"/>
            <TableHeader title="Monthly Payment"/>
            <TableHeader title="Amount Paid For the month"/>
            <TableHeader title="Amount Remaining"/>
            <TableHeader title="Date"/>
            <TableHeader title="Action"/>
          </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          <tr  v-for="(payment) in payments" :key="payment.id">
            <td class="px-6 py-4 whitespace-nowrap flex items-center">
              <div>
                <div class="text-sm font-medium text-gray-900">
                  {{ payment.first_name }} {{payment.other_names}} {{payment.last_name}}
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ payment.email }}

            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ payment.amount }}
            </td>
            <td class="px-3 py-2 whitespace-nowrap text-right text-sm font-medium">
              <LoanStatus :status="payment.status"/>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ payment.monthly_payment }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ payment.amount_to_pay }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{payment.amount_remaining }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{payment.date}}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <router-link :to="{name: 'loan.invoice', params:{id: payment.id}}">
                <p class="rounded-2xl bg-blue-500 p-2 hover:bg-gray-500">Generate Receipt</p>
              </router-link>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
</template>
<Header/>

<style scoped>
.container {
  max-width: 1024px;
}

table, th, td {
  border-collapse: collapse;
}
</style>