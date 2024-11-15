<script setup>

import Header from "@/layouts/user/Header.vue";


</script>

<template>
<Header/>

    <div class="motion-preset-bounce motion-duration-2000o mx-auto grid max-w-2xl h-full grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
<!--      <div class="grid grid-cols-2 grid-rows-2 md:gap-4 sm:gap-6 lg:gap-8">-->
        <div class="lg:mb-52">
          <h3 class="text-3xl font-bold  text-gray-900 sm:text-4xl text-center">Get in touch</h3>
          <p class="mt-4 text-gray-500 text-center">You can contact us through our various socials</p>
        </div>
<!--      </div>-->

      <div class="pb-24">
        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10  lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 512 512">
                <path
                    d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.7 226.4 209.3 245V327.7h-63V256h63v-54.6c0-62.2 37-96.5 93.7-96.5 27.1 0 55.5 4.8 55.5 4.8v61h-31.3c-30.8 0-40.4 19.1-40.4 38.7V256h68.8l-11 71.7h-57.8V501C413.3 482.4 504 379.8 504 256z"/>
              </svg>
              Facebook
            </dt>
            <dd class="mt-2 text-sm text-gray-500 hover:opacity-70"><a
                href="https://web.facebook.com/trinitysoftwarecenter/?_rdc=1&_rdr">Message and follow us on
              facebook</a></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 512 512"><path d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"/></svg>X</dt>
            <dd class="mt-2 text-sm text-gray-500 hover:opacity-70"><a
                href="https://x.com/3nitySoftware">Follow us on
              X</a></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg> Linkedin</dt>
            <dd class="mt-2 text-sm text-gray-500 hover:opacity-70"><a
                href="https://www.linkedin.com/company/trinity-software-center/">Connect with us on linkedin</a></dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 512 512"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7 .3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2 .4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg> Email</dt>
            <dd class="mt-2 text-sm text-gray-500 hover:opacity-70"><a href="mailto:info@trinitysoftwarecenter.com">Send Us a Mail</a>
            </dd>
          </div>
        </dl>
      </div>

    </div>


</template>

<style scoped>

</style>