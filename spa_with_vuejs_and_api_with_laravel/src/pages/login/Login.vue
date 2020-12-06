<template>
  <LoginLayout>
    <div class="container">
      <div class="row valign-wrapper">
        <GridVue width="6" >
          <CardMenuVue>
            <img class="responsive-img" src="@/assets/social/login.jpg"/>
          </CardMenuVue>
        </GridVue>
        <GridVue v-if="register" width="6" >
          <h3>Login</h3>
          <input placeholder="Email" type="text" class="validate">
          <input placeholder="Senha" type="text" class="validate">
          <a class="waves-effect waves-light btn col s4">Entrar</a>
          <a class="waves-effect waves-light btn col s4 orange" @click="register = false">Cadastre-se</a>
        </GridVue>
        <GridVue v-if="!register" width="6" >
          <h3>Cadastro</h3>
          <input placeholder="Nome" type="text" class="validate">
          <input placeholder="Email" type="text" class="validate">
          <input placeholder="Senha" type="text" class="validate">
          <input placeholder="Confirme senha" type="text" class="validate">
          <a class="waves-effect waves-light btn col s3">Enviar</a>
          <a class="waves-effect waves-light btn col s4 orange" @click="register = true">Já tenho conta</a>
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
      register:true,
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
