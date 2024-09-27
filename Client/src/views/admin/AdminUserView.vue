<script setup>

import Header from "@/layouts/admin/Header.vue";
import useAdminSignup from "@/composerables/useAdminSignup.js";
import {onMounted} from "vue";
import TableHeader from "@/components/TableHeader.vue";

const {users, get_users} =useAdminSignup()

onMounted(get_users)
</script>

<template>
  <Header/>

<!--  <div class="p-4 mr-80">-->
<!--    <div class="p-4 rounded-lg">-->
<!--      <div class="container mx-auto my-8">-->
<!--        <div class="flex justify-between items-center">-->
<!--          <h2 class="text-3xl font-semibold">Users</h2>-->
<!--        </div>-->
<!--        <div class="mt-6 bg-white clear-end rounded-lg">-->

  <div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg">
      <div class="mt-6 bg-white clear-end rounded-lg">
        <router-link to="admin_add_user">
          <button
              class="bg-purple-600 text-white rounded hover:bg-purple-700 sm: m-5">
            Add User
          </button>
        </router-link>
          <table class="min-w-full  rounded-3xl shadow divide-y divide-gray-200">
            <thead>
            <tr>
              <TableHeader title="First Name"/>
              <TableHeader title="Last Name"/>
              <TableHeader title="Other Names"/>
              <TableHeader title="Email"/>
              <TableHeader title="Telephone Number"/>
              <TableHeader title="Country"/>
              <TableHeader title="Date Of Birth"/>
              <TableHeader title="Salary"/>
              <TableHeader title="Nation_id"/>
              <TableHeader title="Nationality"/>
              <TableHeader title="User Type"/>
              <TableHeader title="Actions"/>
              <TableHeader title="Created At"/>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="user in users" :key="users.id">
              <td class="px-6 py-4 whitespace-nowrap flex items-center">
                <div>
                  <div class="text-sm font-medium text-gray-900">{{ user.first_name }}</div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{user.last_name}}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{user.other_names}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{user.email}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ user.phone }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ user.country }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{user.date_of_birth}}
              </td>

              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                GHC {{user.salary}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ user.national_id }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                {{ user.nationality }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              {{ user.user_type }}
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
</template>

<style scoped>
.container {
  max-width: 1024px;
}
</style>