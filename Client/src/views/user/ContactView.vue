<script setup>

import Header from "@/layouts/user/Header.vue";
import Footer from "@/layouts/user/Footer.vue";


</script>

<template>
  <Header/>
  <div class="bg-white">

    <div
        class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
        <div>
          <h3 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Get in touch</h3>
          <p class="mt-4 text-gray-500">You can contact us through our various socials</p>
        </div>
      </div>

      <div class="sm: mt-10">
        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10  lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Facebook</dt>
            <dd class="mt-2 text-sm text-gray-500"><a
                href="https://web.facebook.com/trinitysoftwarecenter/?_rdc=1&_rdr">Message and follow us on
              facebook</a></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">X</dt>
            <dd class="mt-2 text-sm text-gray-500"><a
                href="https://x.com/3nitySoftware">Follow us on
              X</a></dd>
          </div>
            <div class="border-t border-gray-200 pt-4">
              <dt class="font-medium text-gray-900">Linkedin</dt>
              <dd class="mt-2 text-sm text-gray-500"><a
                  href="https://www.linkedin.com/company/trinity-software-center/">Connect with us on linkedin</a></dd>
            </div>
            <div class="border-t border-gray-200 pt-4">
              <dt class="font-medium text-gray-900">Email</dt>
              <dd class="mt-2 text-sm text-gray-500"><a href="mailto:info@trinitysoftwarecenter.com">Send Us a Mail</a>
              </dd>
            </div>
          </dl>
      </div>

    </div>

  </div>

  <Footer/>
</template>

<style scoped>

</style>