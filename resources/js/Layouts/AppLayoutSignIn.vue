<script>
import Sidemenu from "./Admin/Sidemenu.vue";
import TopNav from "./Admin/TopNav.vue";
import Footer from "./Admin/Footer.vue";

export default {
  components: {
    Sidemenu,
    TopNav,
    Footer,
  },
};
</script>

<template>
  <div>
    <!-- <div id="loading">
         <div id="loading-center">
         </div>
      </div> -->
    <div class="wrapper">
      <slot />
    </div>
    <Footer />
  </div>
</template>
