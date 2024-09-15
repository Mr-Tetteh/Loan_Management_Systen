<script setup>

import Header from "@/layouts/user/Header.vue";
import Footer from "@/layouts/user/Footer.vue";
</script>

<template>
  <Header/>
  <h3 class="text-center m-10 text-3xl">Here is a list of all your loans</h3>
  <!--  <div class="ml-96 px-52 space-x-96">-->
  <div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg ml-96">
      <table class="border-collapse border border-slate-500 ..">
        <thead>
        <tr>
          <th class="border border-slate-700">Amount</th>
          <th class="border border-slate-700">Purpose</th>
          <th class="border border-slate-700">Amount Remaining</th>
          <th class="border border-slate-700">Date Request</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td class="border border-slate-700">GHC 2030</td>
          <td class="border border-slate-700">For enjoyment</td>
          <td class="border border-slate-700">GHC -323</td>
          <td class="border border-slate-700">20-2-3</td>
        </tr>
        </tbody>

      </table>
    </div>
  </div>

  <!--  </div>-->


  <Footer/>
</template>

<style scoped>

</style>