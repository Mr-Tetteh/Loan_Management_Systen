<script setup>
import TableHeader from "@/components/TableHeader.vue";
import LoanStatus from "@/components/LoanStatus.vue";
import Header from "@/layouts/user/Header.vue";
import {onMounted} from "vue";
import usePayments from "@/composerables/usePayments.js";

const {payments, get_user_history_loans} = usePayments()

onMounted(() => get_user_history_loans())
</script>

<template>

      <p class="text-3xl text-center">Here is a list of all your loan History</p>
      <div class="mt-6 bg-white clear-end rounded-lg p-10">
        <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
          <thead>
          <tr>
            <TableHeader title="Full Name"/>
            <TableHeader title="Email"/>
            <TableHeader title="Loan Amount"/>
            <TableHeader title="Loan Status"/>
            <TableHeader title="Monthly Payment"/>
            <TableHeader title="Amount Remaining"/>
            <TableHeader title="Date"/>

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
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
              {{ payment.amount }}
            </td>
            <td class="px-3 py-2 whitespace-nowrap  text-sm font-medium">
              <LoanStatus :status="payment.status"/>
            </td>
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
              {{ payment.monthly_payment }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
              {{payment.amount_remaining }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
              {{payment.date}}
            </td>

          </tr>
          </tbody>
        </table>
      </div>

</template>

<style scoped>

</style>