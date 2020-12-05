<template>
  <LoginLayout>
    <div class="container">
      <div class="row">
        <GridVue width="6">
          Left
        </GridVue>
        <GridVue width="6">
          <h3>Login</h3>
          <input placeholder="Email" type="text" class="validate">
          <input placeholder="Senha" type="text" class="validate">
          <a class="waves-effect waves-light btn col s3 offset-s9">Entrar</a>
        </GridVue>
      </div>
    </div>
  </LoginLayout>
</template>

<script>
import LoginLayout from "@/layouts/LoginLayout.vue";
import GridVue from "@/components/GridVue.vue";
import CardMenuVue from "@/components/CardMenuVue.vue";
import CardContentVue from "@/components/social/CardContentVue.vue";
import CardDetalhesVue from "@/components/social/CardDetalhesVue.vue";
import PublicContentVue from "@/components/social/PublicContentVue.vue";

export default {
  name: "HelloWorld",
  components: {
    LoginLayout,
    GridVue,
    CardMenuVue,
    CardContentVue,
    CardDetalhesVue,
    PublicContentVue,
  },
  data() {
    return {
      msg: "Welcome to Your Vue.js App",
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
