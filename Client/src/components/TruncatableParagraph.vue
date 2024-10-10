<script setup>
import {ref} from "vue";
  const maxLength = ref(25)
  const props = defineProps({text: String})
</script>

<template>
  <p @click="maxLength = maxLength === 25 ? text.length : 25">{{ text.slice(0, maxLength)+"..." }}</p>
</template>

<style scoped>

</style>