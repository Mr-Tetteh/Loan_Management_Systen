<script setup>

const props = defineProps({
  status: {
    type: String,
    required: true
  }
})

const statuses = {
  "pending": "bg-amber-100 text-amber-800",
  "rejected": "bg-rose-100 text-rose-800",
  "approved": "bg-sky-100 text-sky-800",
  "paid": "bg-emerald-100 text-emerald-800",

}


</script>


<template>
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="statuses[status.toLowerCase()]">
                 {{ status }}
              </span>
</template>

<style scoped>

</style>