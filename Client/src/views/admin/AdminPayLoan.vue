<script setup>
import useLoan from "@/composerables/useLoan.js";

const {loan, get_loan_update, updateloan} = useLoan()
const {payment, storepayments} = usePayments()
import {onMounted, reactive, ref} from 'vue'
import usePayments from "@/composerables/usePayments.js";
import Header from "@/layouts/user/Header.vue";

const props = defineProps({
  id: {
    type: String,
    required: true
  }
})

onMounted(() => get_loan_update(props.id))

const isloading = ref(false)

const form = reactive({
  date: "",
  amount_to_pay: "",
  salary_for_the_month: "",
  amount_remaining: loan.amount_remaining,
  email: loan.email,
  loan_id: props.id,
});




const pay = async (loan) =>{
  if (isloading.value) return
  isloading.value=true
  form.user_id = loan.user_id
  await storepayments({...form})
  isloading.value=false
}

</script>

<template>
  <Header/>
    <div class="p-4 rounded-lg">
      <div class="mt-6 bg-white clear-end rounded-lg shadow shadow-cyan-600 p-10">
        <form v-if="loan" @submit.prevent="pay(loan)">
          <div class="space-y-12">
            <h2 class="justify-center text-3xl px-96">Monthly Deduction</h2>

            <div class="border-b border-gray-900/10 pb-12">

              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                  <div class="mt-2">
                    <input v-model="loan.first_name" type="text" name="first-name" id="first-name"
                           autocomplete="given-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                  <div class="mt-2">
                    <input v-model="loan.last_name" type="text" name="last-name" id="last-name"
                           autocomplete="family-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="other-name" class="block text-sm font-medium leading-6 text-gray-900">Other name</label>
                  <div class="mt-2">
                    <input v-model="loan.other_names" type="text" id="other-name" autocomplete="family-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
                  <div class="mt-2">
                    <input v-model="loan.email" type="email" name="email" id="last-name" autocomplete="family-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>


                <div class="sm:col-span-2 sm:col-start-1">
                  <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Purpose</label>
                  <div class="mt-2">
                    <input v-model="loan.purpose" type="text" name="city" id="city" autocomplete="address-level2"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Telephone Number</label>
                  <div class="mt-2">
                    <input v-model="loan.phone" type="text" name="region" id="region" autocomplete="address-level1"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Country
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.country" type="text" name="postal-code" id="postal-code"
                           autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">National ID
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.national_id" type="text" id="national_id" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.salary" type="text" id="postal-code" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="loan_amount" class="block text-sm font-medium leading-6 text-gray-900">Loan Amount
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.amount" type="text" id="national_id" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="loan_amount" class="block text-sm font-medium leading-6 text-gray-900">Monthly Payment
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.monthly_payment" type="text" id="national_id" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="loan_amount" class="block text-sm font-medium leading-6 text-gray-900">Amount Remaining
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.amount_remaining" type="text" id="national_id" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           disabled/>
                  </div>
                </div>


                <div class="sm:col-span-2">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Loan status</label>
                  <div class="mt-2">
                    <select v-model="loan.status" id="country" name="country" autocomplete="country-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                            disabled>
                      <option value="pending">Pending</option>
                      <option value="approved">Approve</option>
                      <option value="rejected">Reject</option>
                    </select>

                  </div>
                </div>


                <div class="sm:col-span-2">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Month
                  </label>
                  <div class="mt-2">
                    <input v-model="form.date" id="country" name="country" type="date" autocomplete="country-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" placeholder="Enter month of payment here">
                  </div>
                </div>



                <div class="sm:col-span-2">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Enter
                    Deduction</label>
                  <div class="mt-2">
                    <input v-model="form.amount_to_pay" id="country" name="country" autocomplete="country-name" type="number"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" placeholder="Enter Amount here">
                  </div>
                </div>
                <div class="sm:col-span-2">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Enter
                    Salary for the month</label>
                  <div class="mt-2">
                    <input v-model="form.salary_for_the_month" id="country" name="country" autocomplete="country-name" type="number"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6" placeholder="Enter Amount here">
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" :disabled="isloading"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:opacity-70 disabled:cursor-not-allowed" >
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
</template>

<style scoped>

</style>