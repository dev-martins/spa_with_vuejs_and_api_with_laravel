<template>
  <span  id="app">
    <header>
      <nav-bar background="green" >
        <li><router-link to="/">Home</router-link></li>
        <li><router-link to="/login">Login</router-link></li>
      </nav-bar>
    </header>
    <main>
      <slot/>
    </main>
    <!-- footer --->
    <footer-vue background="green">
      <li><a class="grey-text text-lighten-3" href="#!">Social</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
      <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
    </footer-vue>
    <!-- /footer --->
  </span>
</template>

<script>
import NavBar from "@/components/NavBar";
import FooterVue from "@/components/FooterVue.vue";

export default {
  name: "SiteLayout",
  components: {
    NavBar,
    FooterVue,
  },
};
</script>


