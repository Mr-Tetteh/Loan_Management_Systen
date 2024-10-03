<script setup>
import useAdminSignup from "@/composerables/useAdminSignup.js"
import {onMounted, ref} from 'vue'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from '@headlessui/vue'


const props = defineProps({
  user:{
    type: Object,
    required: true
  },
  closeModal: {
    type: Function,
    required: true
  },

})

</script>
<template>
  <div class="fixed inset-0 flex items-center justify-center ">

  </div>
  <TransitionRoot appear :show="!!user" as="template">
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

      <div class="fixed inset-0 overflow-y-auto  ">
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
                class="max-w-screen-2xl transform rounded-2xl bg-white p-6 my-10 text-left shadow-xl transition-all w-full ml-52"
            >
              <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                Details of <span class="text-sky-300">{{user.first_name}} {{user.other_names}} {{user.last_name}} </span>
              </DialogTitle>
              <div class="mt-2 w-full overflow-auto">
                <p class="text-sm text-gray-500">
                  <table border="10px" class="w-full table-auto">
                    <tr>
                      <th class="p-5 text-left">First Name: </th>
                      <td class="p-5" colspan="2">{{ user.first_name }}</td>
                      <th class="p-5 text-left">Last Name: </th>
                      <td class="p-5" colspan="2">{{ user.last_name }}</td>
                      <th class="p-5 text-left">Other Names: </th>
                      <td class="p-5" colspan="2">{{user.other_names}}</td>
                    </tr>

                    <tr>
                      <th class="p-5 text-left">Email: </th>
                      <td class="p-5" colspan="2">{{user.email}}</td>
                      <th class="p-5 text-left">Phone: </th>
                      <td class="p-5" colspan="2">{{ user.phone }}</td>
                    </tr>

                    <tr>
                      <th class="p-5 text-left">Country: </th>
                      <td class="p-5">{{ user.country }}</td>
                      <th class="p-5 text-left">Salary: </th>
                      <td class="p-5">GHC {{ user.salary }}</td>
                    </tr>

                    <tr>
                      <th class="p-5 text-left">National ID: </th>
                      <td class="p-5">{{user.national_id}}</td>
                      <th class="p-5 text-left">User Type: </th>
                      <td class="p-5">{{ user.user_type}}</td>
                      <th class="p-5 text-left">Nationality: </th>
                      <td class="p-5">{{ user.nationality }}</td>
                      <th class="p-5 text-left">Date Joined: </th>
                      <td class="p-5">{{user.created_at}}</td>
                    </tr>
                  </table>
                </p>
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

<style scoped>
.container {
  max-width: 1024px;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
