<script setup>
const props = defineProps({
  title: {
    type: String,
    required: true
  }
})

</script>

<template>
  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> {{title}}</th>

</template>

<style scoped>

</style>