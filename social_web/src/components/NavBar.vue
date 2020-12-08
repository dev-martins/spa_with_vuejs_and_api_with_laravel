<template>
  <nav :class="background || 'blue'">
    <div class="nav-wrapper container">
      <router-link class="brand-logo" :to="url || '/'">{{ logo || 'Social'}}</router-link>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <slot/>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "NavBar",
  props: ['logo','url','background'],
  data() {
    return {};
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
