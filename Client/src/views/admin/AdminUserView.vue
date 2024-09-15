<script setup>

import Header from "@/layouts/admin/Header.vue";


</script>

<template>
  <Header/>
  <div class="p-4 mr-80">
    <div class="p-4 rounded-lg">
      <div class="container mx-auto my-8">
        <div class="flex justify-between items-center">
          <h2 class="text-3xl font-semibold">Users</h2>

          <router-link to="register">
          <button
              class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 sm: m-5">
            Add User
          </button>
          </router-link>
        </div>


        <div class="mt-6 bg-white clear-end rounded-lg">
          <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
            <thead>
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Other Names
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telephone
                Number
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Birth
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salary</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">National_id
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nationality
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Type</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created AT</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap flex items-center">
                <div>
                  <div class="text-sm font-medium text-gray-900">Daniel</div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">GOOD GOD</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                Nii Ayitey
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                danielsatu73@gmail.com
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                0559724772
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                Ghana
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                29-10-2024
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                USD 200000
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                GH93ifsd3we3ws
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                Ghanaian
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              Admin
              </span>
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                Edit
                Delete
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                20-12-12
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.container {
  max-width: 1024px;
}
</style>