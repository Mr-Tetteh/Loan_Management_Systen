<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from "@/layouts/user/Header.vue";
</script>

<template>
  <main>
    <Header />
    <section class="md:ml-64 p-10 h-screen">
      <RouterView />
    </section>
  </main>
</template>

<style scoped>

</style>
