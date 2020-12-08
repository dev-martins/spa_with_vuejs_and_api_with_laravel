<template>
  <LoginLayout>
    <div class="container">
      <div class="row valign-wrapper">
        <GridVue width="6" >
          <CardMenuVue>
            <img class="responsive-img" src="@/assets/social/login.jpg"/>
          </CardMenuVue>
        </GridVue>
        <GridVue width="6" >
          <h3>Login</h3>
          <input placeholder="Email" type="text" class="validate">
          <input placeholder="Senha" type="text" class="validate">
          <a class="waves-effect waves-light btn col s4">Entrar</a>
          <router-link class="waves-effect waves-light btn col s4 orange offset-s1" to="/cadastro">Cadastre-se</router-link>
        </GridVue>
      </div>
    </div>
  </LoginLayout>
</template>

<style>
.btn{
  margin-top:5px;
}
</style>
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
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
