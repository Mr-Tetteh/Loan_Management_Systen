<script setup>
import useLoan from "@/composerables/useLoan.js";
import {onMounted} from 'vue'

const {loan, get_loan_update, updateloan} = useLoan()


const props = defineProps({
  id: {
    type: String,
    required: true
  }
})

const editloan =  async () => {
  await updateloan(props.id)
}

onMounted(() => get_loan_update(props.id))

</script>


<template>

  <div v-if="loan" class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg">
      <div class="mt-6 bg-white clear-end rounded-lg shadow shadow-cyan-600 p-10">
        <form  @submit.prevent="editloan">
          <div class="space-y-12">
            <h2 class="justify-center text-3xl px-96">Edit Loan & Monthly Deductions</h2>

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
                    <input v-model="loan.last_name" type="text" name="last-name" id="last-name" autocomplete="family-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="other-name" class="block text-sm font-medium leading-6 text-gray-900">Other name</label>
                  <div class="mt-2">
                    <input v-model="loan.other_names" type="text" id="other-name" autocomplete="family-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"disabled/>
                  </div>
                </div>

                <div class="sm:col-span-3">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email Address</label>
                  <div class="mt-2">
                    <input v-model="loan.email" type="email" name="email" id="last-name" autocomplete="family-name"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>


                <div class="sm:col-span-2 sm:col-start-1">
                  <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Purpose</label>
                  <div class="mt-2">
                    <input v-model="loan.purpose" type="text" name="city" id="city" autocomplete="address-level2"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="region" class="block text-sm font-medium leading-6 text-gray-900">Telephone Number</label>
                  <div class="mt-2">
                    <input v-model="loan.phone" type="text" name="region" id="region" autocomplete="address-level1"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Country
                    </label>
                  <div class="mt-2">
                    <input v-model="loan.country" type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>


                <div class="sm:col-span-2">
                  <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.salary" type="text" id="postal-code" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">National ID
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.national_id" type="text"  id="national_id" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>
                <div class="sm:col-span-2">
                  <label for="loan_amount" class="block text-sm font-medium leading-6 text-gray-900">Loan Amount
                  </label>
                  <div class="mt-2">
                    <input v-model="loan.amount" type="text"  id="national_id" autocomplete="postal-code"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" disabled/>
                  </div>
                </div>


                <div class="sm:col-span-2">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Loan status</label>
                  <div class="mt-2">
                    <select v-model="loan.status" id="country" name="country" autocomplete="country-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                      <option value="pending">Pending</option>
                      <option value="approved">Approve</option>
                      <option value="rejected">Reject</option>
                    </select>

                  </div>
                </div>


                <div class="sm:col-span-2">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Monthly Deductions</label>
                  <div class="mt-2">
                    <input v-model="loan.amount_remaining" id="country" name="country" autocomplete="country-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

