<script setup>
import {onMounted, ref} from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'
import useLoan from "@/composerables/useLoan.js";

const isOpen = ref(true)

function closeModal() {
  isOpen.value = false
}

function openModal() {
  isOpen.value = true
}

const props = defineProps({
  id: {
    type: String,
    required: true
  }
})
const {loan, get_loan_update} = useLoan()

onMounted(() => get_loan_update(props.id))
</script>

<template>
  <div class="fixed inset-0 flex items-center justify-center">
    <button
        type="button"
        @click="openModal"
        class="rounded-md bg-black/20 px-4 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75"
    >
      Open dialog
    </button>
  </div>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModal" class="relative z-10">
      <TransitionChild
          as="template"
          enter="duration-300 ease-out"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="duration-200 ease-in"
          leave-from="opacity-100"
          leave-to="opacity-0"
      >
        <div class="fixed inset-0 bg-black/25"/>
      </TransitionChild>

      <div class="fixed inset-0 overflow-y-auto">
        <div
            class="flex min-h-full items-center justify-center p-4 text-center"
        >
          <TransitionChild
              as="template"
              enter="duration-300 ease-out"
              enter-from="opacity-0 scale-95"
              enter-to="opacity-100 scale-100"
              leave="duration-200 ease-in"
              leave-from="opacity-100 scale-100"
              leave-to="opacity-0 scale-95"
          >
            <DialogPanel
                class=" transform overflow-hidden rounded-2xl bg-white p-6 text-left  transition-all"
            >
              <DialogTitle
                  as="h3"
                  class="text-lg font-medium leading-6 text-gray-900"
              >
                Payment successful
                {{ props }}}
              </DialogTitle>
              <div class="mt-2">
                <table class="table border-solid">
                  <tr>
                     <td class="border-dashed border-4 border-sky-300 col-span-2 gap-2"><b>Full Name:</b>  {{ loan.first_name }}
                        {{ loan.other_names }} {{ loan.last_name }}
                      </td>
                      <td class="border-dashed border-4 border-sky-300 col-span-2"><b> Email:</b> {{ loan.email }}</td>
                  </tr>

                  <tr>
                    <td class="border-dashed border-4 border-sky-300 gap-2"><b>Phone Number:</b>  {{ loan.phone }}
                    </td>
                    <td class="border-dashed border-4 border-sky-300 col-span-3"><b> Purpose:</b> {{ loan.purpose }}</td>
                  </tr>

                  <tr>
                    <td class="border-dashed border-4 border-sky-300  gap-2"><b>Amount Requested:</b> GHC {{ loan.amount }}
                    </td>
                    <td class="border-dashed border-4 border-sky-300 "><b>Amount Remaining:</b> GHC {{ loan.amount - loan.amount_remaining}}</td>
                  </tr>

                  <tr>
                    <td class="border-dashed border-4 border-sky-300 gap-2"><b>Salary:</b>  {{ loan.salary }}
                    </td>
                    <td class="border-dashed border-4 border-sky-300"><b> Loan Status:</b> {{ loan.status }}</td>
                  </tr>

                  <tr>
                    <td class="border-dashed border-4 border-sky-300  gap-2"><b>Country:</b>  {{ loan.country }}
                    </td>
                    <td class="border-dashed border-4 border-sky-300 "><b> Nationality:</b> {{loan.nationality}}</td>
                  </tr>
                  <tr>
                    <td class="border-dashed border-4 border-sky-300 col-span-2"><b> National ID:</b> {{loan.national_id }}</td>
                  </tr>

                </table>
              </div>

              <div class="mt-4">
                <button
                    type="button"
                    class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                    @click="closeModal"
                >
                  Got it, thanks!
                </button>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

