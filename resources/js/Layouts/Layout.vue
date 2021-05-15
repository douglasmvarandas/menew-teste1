<template>
  <main>
  <sidebar/>
  <div class="site-content">
    <!-- <navbar/> -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <slot />
        </div>
      </div>
    </div>
  </div>
  </main>
</template>

<script>
import Navbar from './Navbar.vue'
import Sidebar from './Sidebar.vue'

export default {
  components: {
    Navbar,
    Sidebar,
  },
  props: {
    title: String,
  },
  watch: {
    title: {
      immediate: true,
      handler(title) {
        document.title = title;
      },
    },
  },
};
</script>

<style>
.site-content {
  width: 100% !important;
  overflow-y: scroll !important;
}
</style>