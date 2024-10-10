<script setup>

import Header from "@/layouts/user/Header.vue";
import useAdminSignup from "@/composerables/useAdminSignup.js";
import {onMounted} from "vue";
import useLoan from "@/composerables/useLoan.js";
import {watch} from "vue";

const {user, number, number_of_users} = useAdminSignup();
const {number_of_pending, number_of_approve, number_of_rejected, numb_of_pending_loans, numb_of_approve_loans, numb_of_rejected_loans} = useLoan()

onMounted(number_of_users(), numb_of_pending_loans(), numb_of_approve_loans(), numb_of_rejected_loans())

const name = 'GooglePieChart'

const loadGoogleCharts = () => {
  const script = document.createElement('script');
  script.src = 'https://www.gstatic.com/charts/loader.js';
  script.onload = () => {
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);
  };
  document.body.appendChild(script);

}

const drawChart = () => {
  const data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    ['Total Number Of Users', number.value],
    ['Total Number of approved', number_of_approve.value],
    ['Total Number of approved', number_of_pending.value],
    ['Total Number of rejected', number_of_rejected.value]

  ])

  const options = {
    title: 'Graphical Representation',
    width: 900,
    height: 500,
  };

  const chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);

}


watch([number,number_of_pending,number_of_approve], async () => {
  if (number.value && number_of_approve.value && number_of_pending.value){
    loadGoogleCharts()
  }
})

</script>




<template>
  <Header/>
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
        <div class="bg-amber-300 flex flex-col justify-center items-center min-h-[100px] p-4">
          <router-link to="admin_pending_loan"> <p class="text-2xl text-center">Total Number of Pending Loans</p></router-link>
          <br>
          <p class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" viewBox="0 0 384 512">
              <path
                  d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48l8 0 0 19c0 40.3 16 79 44.5 107.5L158.1 256 76.5 337.5C48 366 32 404.7 32 445l0 19-8 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l336 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-8 0 0-19c0-40.3-16-79-44.5-107.5L225.9 256l81.5-81.5C336 146 352 107.3 352 67l0-19 8 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L24 0zM192 289.9l81.5 81.5C293 391 304 417.4 304 445l0 19L80 464l0-19c0-27.6 11-54 30.5-73.5L192 289.9zm0-67.9l-81.5-81.5C91 121 80 94.6 80 67l0-19 224 0 0 19c0 27.6-11 54-30.5 73.5L192 222.1z"/>
            </svg>
            <span class="text-2xl">{{ number_of_pending }}</span>
          </p>
        </div>
        <div class="bg-emerald-300 flex flex-col justify-center items-center min-h-[100px] p-4">
<!--          <router-link to=""-->
          <router-link to="admin_active_loan"><p class="text-2xl text-center">Total Number of Approved Loans</p></router-link>
          <br>
          <p class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-20">
              <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
            </svg>
            <span class="text-2xl">{{ number_of_approve }}</span>
          </p>
        </div>
        <div class="bg-blue-300 flex flex-col justify-center items-center min-h-[100px] p-4">
          <router-link to="admin_user"> <p class="text-2xl text-center">Total Number of Users</p></router-link>
          <br>
          <p class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="size-20">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
            </svg>
            <span class="text-2xl">{{ number }}</span>
          </p>
        </div>


        <div class="bg-red-300 flex flex-col justify-center items-center min-h-[100px] p-4">
          <p class="text-2xl text-center">Total Number of Rejected Loans</p>
          <br>
          <p class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="60"><path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>
            <span class="text-2xl">{{ number_of_rejected }}</span>
          </p>
        </div>

        <div class="bg-indigo-300 flex flex-col justify-center items-center min-h-[100px] p-4">
          <p class="text-2xl text-center">Total Number of Paid Loans</p>
          <br>
          <p class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="60"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M32 0C49.7 0 64 14.3 64 32l0 16 69-17.2c38.1-9.5 78.3-5.1 113.5 12.5c46.3 23.2 100.8 23.2 147.1 0l9.6-4.8C423.8 28.1 448 43.1 448 66.1l0 279.7c0 13.3-8.3 25.3-20.8 30l-34.7 13c-46.2 17.3-97.6 14.6-141.7-7.4c-37.9-19-81.3-23.7-122.5-13.4L64 384l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-80 0-66L0 64 0 32C0 14.3 14.3 0 32 0zM64 187.1l64-13.9 0 65.5L64 252.6 64 318l48.8-12.2c5.1-1.3 10.1-2.4 15.2-3.3l0-63.9 38.9-8.4c8.3-1.8 16.7-2.5 25.1-2.1l0-64c13.6 .4 27.2 2.6 40.4 6.4l23.6 6.9 0 66.7-41.7-12.3c-7.3-2.1-14.8-3.4-22.3-3.8l0 71.4c21.8 1.9 43.3 6.7 64 14.4l0-69.8 22.7 6.7c13.5 4 27.3 6.4 41.3 7.4l0-64.2c-7.8-.8-15.6-2.3-23.2-4.5l-40.8-12 0-62c-13-3.8-25.8-8.8-38.2-15c-8.2-4.1-16.9-7-25.8-8.8l0 72.4c-13-.4-26 .8-38.7 3.6L128 173.2 128 98 64 114l0 73.1zM320 335.7c16.8 1.5 33.9-.7 50-6.8l14-5.2 0-71.7-7.9 1.8c-18.4 4.3-37.3 5.7-56.1 4.5l0 77.4zm64-149.4l0-70.8c-20.9 6.1-42.4 9.1-64 9.1l0 69.4c13.9 1.4 28 .5 41.7-2.6l22.3-5.2z"/></svg>            <span class="text-2xl">{{ number_of_rejected }}</span>
          </p>
        </div>

      </div>

      <div class="flex items-center justify-center h-48 mb-52 rounded bg-gray-50">
        <div id="piechart" style="width: 900px; height: 500px;" class="mt-52 py-32"></div>
      </div>
    </div>
  </div>

</template>
<style scoped>

</style>