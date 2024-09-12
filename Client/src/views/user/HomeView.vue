<script setup>
import {ref} from 'vue'
import {Dialog, DialogPanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import Header from "@/layouts/user/Header.vue";
import Footer from "@/layouts/user/Footer.vue";

const navigation = [
  {name: 'Product', href: '#'},
  {name: 'Features', href: '#'},
  {name: 'Marketplace', href: '#'},
  {name: 'Company', href: '#'},
]

const mobileMenuOpen = ref(false)
</script>

<template>
  <Header/>
  <div class="bg-white">
    <div class="relative isolate px-6 pt-5 lg:px-8">
      <div class="absolute inset-x-0 -top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
           aria-hidden="true">
        <div
            class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"/>
      </div>
      <div class="mx-auto max-w-2xl py-10 sm:py-20 lg:py-20">
        <div class="text-center">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Welcome to Trinity Loan Management
            System</h1>
          <p class="mt-6 text-lg leading-8 text-gray-600"> Managing loans can be a complex and time-consuming process,
            but with our advanced loan management system, we make it simple and efficient. Whether you’re a business,
            financial institution, or individual, our platform is designed to help you handle all aspects of loan
            management seamlessly..</p>
          <p class="mt-6 text-lg leading-8 text-gray-600">Our system offers an intuitive interface for tracking loans,
            payments, and borrower details. We prioritize transparency, enabling both lenders and borrowers to have
            clear and real-time access to loan information. From loan origination to repayment tracking, we streamline
            every step, ensuring accuracy and reducing manual effort </p>
          <p class="mt-6 text-lg leading-8 text-gray-600">Built with robust security features, your data is protected,
            while our automated processes help minimize errors and delays. With support for flexible loan terms and
            repayment schedules, our solution caters to a wide range of financial needs, offering a tailored experience
            for each user.</p>
          <p class="mt-6 text-lg leading-8 text-gray-600">Join us in simplifying loan management and focus on what truly
            matters — growing your financial portfolio with confidence.</p>
          <div class="mt-10 flex items-center justify-center gap-x-6">
            <RouterLink
                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                to="login">Get Started
            </RouterLink>
          </div>
        </div>
      </div>
      <div
          class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
          aria-hidden="true">
        <div
            class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"/>
      </div>
    </div>
  </div>

  <Footer/>
</template>

<style scoped>

</style>