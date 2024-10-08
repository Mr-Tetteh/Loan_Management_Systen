<script setup>
const props = defineProps({
  userType: {
    type: String,
    required: true
  }
})

const userTypes = {
  "Admin": "bg-green-400 text-gray-900",
  "User": "bg-blue-400 text-gray-900"
}
</script>

<template>
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="userTypes[userType]">
  {{ userType }}
</span>
</template>

<style scoped>

</style>