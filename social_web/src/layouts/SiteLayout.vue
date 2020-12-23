<template>
  <span id="app">
    <header>
      <nav-bar background="blue">
        <li v-if="!user"><router-link to="/login">Login</router-link></li>
        <li v-if="!user"><router-link to="/cadastro">Cadastre-se</router-link></li>
        <li v-if="user">
          <router-link to="/perfil">{{ user.name }}</router-link>
        </li>
        <li v-if="user"><a @click="sair()">Sair</a></li>
      </nav-bar>
    </header>
    <main style="min-height:400px">
      <slot />
    </main>
    <!-- footer --->
    <footer-vue background="blue">
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
  data() {
    return {
      user: false,
    };
  },
  mounted() {
    let userAuth = sessionStorage.getItem("user");
    if (userAuth) {
      this.user = JSON.parse(userAuth);
    }else{
      this.$router.push('/login');
    }
  },
  methods: {
    sair() {
      sessionStorage.clear();
      this.user = false;
      this.$router.push('/login');
    },
  },
};
</script>
