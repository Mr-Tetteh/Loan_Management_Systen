<script setup>

import Header from "@/layouts/admin/Header.vue";
</script>


<template>
  <Header/>
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div class="grid grid-cols-3 gap-4 mb-4">
        <div class="flex items-center justify-center h-24 rounded bg-gray-50 ">
          <p class="text-2xl text-gray-400 ">
            Total Number of Pending Loans
          </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-gray-50">
          <p class="text-2xl text-gray-400 ">
            Total Number of Approved Loans
          </p>
        </div>
        <div class="flex items-center justify-center h-24 rounded bg-gray-50">
          <p class="text-2xl text-gray-400">
            Total number of users
          </p>
        </div>
      </div>
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50">
        <p class="text-2xl text-gray-400 ">
          Graph
        </p>
      </div>
    </div>
  </div>

</template>

<style scoped>

</style>