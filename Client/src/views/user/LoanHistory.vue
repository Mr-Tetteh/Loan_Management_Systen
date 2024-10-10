<script setup>
import TableHeader from "@/components/TableHeader.vue";
import LoanStatus from "@/components/LoanStatus.vue";
import Header from "@/layouts/user/Header.vue";
import useLoan from "@/composerables/useLoan.js";
import {onMounted} from "vue";

const {loans, get_user_history_loans} = useLoan()

onMounted(() => get_user_history_loans())
</script>

<template>

    <div class="p-4 rounded-lg">
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
          <tr  v-for="(loan) in loans" :key="loan.id">
            <td class="px-6 py-4 whitespace-nowrap flex items-center">
              <div>
                <div class="text-sm font-medium text-gray-900">
                  {{ loan.first_name }} {{loan.other_names}} {{loan.last_name}}
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ loan.email }}

            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ loan.amount }}
            </td>
            <td class="px-3 py-2 whitespace-nowrap text-right text-sm font-medium">
              <LoanStatus :status="loan.status"/>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{ loan.monthly_payment }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{loan.amount_remaining }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              {{loan.date}}
            </td>

          </tr>
          </tbody>
        </table>
      </div>
    </div>

</template>

<style scoped>

</style>