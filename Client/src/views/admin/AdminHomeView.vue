<script setup>

import Header from "@/layouts/admin/Header.vue";
import useAdminSignup from "@/composerables/useAdminSignup.js";
import {onMounted} from "vue";
import useLoan from "@/composerables/useLoan.js";


const {user, number, number_of_users} = useAdminSignup();
const {number_of_pending, number_of_approve, numb_of_pending_loans, numb_of_approve_loans,} = useLoan()

onMounted(number_of_users(), numb_of_pending_loans(), numb_of_approve_loans())

</script>

<script>
export default {
  name: 'GooglePieChart',
  mounted() {
    this.loadGoogleCharts();
  },
  methods: {
    loadGoogleCharts() {
      const script = document.createElement('script');
      script.src = 'https://www.gstatic.com/charts/loader.js';
      script.onload = () => {
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(this.drawChart);
      };
      document.body.appendChild(script);
    },
    drawChart() {
      const data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Total Number Of pending Loans', 4],
        ['Total Number of approved', 5],
        ['Total Number of approved', 6]
      ])


      const options = {
        title: 'Graphical Representation',
        width: 900,
        height: 500,
      };

      const chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    },
  },
};
</script>


<template>
  <Header/>
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
        <div class="bg-amber-300 flex flex-col justify-center items-center min-h-[100px] p-4">
          <p class="text-2xl text-center">Total Number of Pending Loans</p>
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
          <p class="text-2xl text-center">Total Number of Approved Loans</p>
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
          <p class="text-2xl text-center">Total Number of Users</p>
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
      </div>
      <div class="flex items-center justify-center h-48 mb-52 rounded bg-gray-50">
        <div id="piechart" style="width: 900px; height: 500px;" class="mt-52 py-32"></div>
      </div>
    </div>
  </div>

</template>
<style scoped>

</style>