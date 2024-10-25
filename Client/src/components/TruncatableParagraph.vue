<script setup>
import {computed, ref} from "vue";
  const maxLength = ref(25)
  const props = defineProps({text: String})



const showFullPurpose = ref(false);

const toggleFullPurpose = () =>{
  showFullPurpose.value = !showFullPurpose.value
}
const truncatedPurpose = computed(() => {
  let purpose = props.text
  if (!showFullPurpose.value){
    purpose = purpose.substring(0,90) + "..."
  }
  return purpose

});
</script>

<template>


  <p>{{truncatedPurpose}}</p>
  <button @click="toggleFullPurpose" class="text-green-500 hover:text-green-600 mb-5"> {{showFullPurpose ? 'Less' : 'More'}} </button>

</template>

<style scoped>

</style>