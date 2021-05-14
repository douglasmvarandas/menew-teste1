<template>
  <div>
  <navbar/>
  <div class="container">
    <div class="row">
      <div class="col-md-1">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
          </li>
        </ul>
      </div>
      <div class="col-md-11">
        <slot />
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import Navbar from './Navbar.vue'

export default {
  components: {
    Navbar,
  },
  prrops: {
    title: String,
  },
  watch: {
    title: {
      immediate: false,
      handler(title) {
        document.title = title;
      },
    },
  },
};
</script>