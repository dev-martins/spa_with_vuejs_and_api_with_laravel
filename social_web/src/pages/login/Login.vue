<template>
  <LoginLayout>
    <div class="container">
      <div class="row valign-wrapper">
        <GridVue width="6">
          <CardMenuVue>
            <img class="responsive-img" src="@/assets/social/login.jpg" />
          </CardMenuVue>
        </GridVue>
        <GridVue width="6">
          <h3>Login</h3>
          <input placeholder="Email" type="email" class="validate" v-model="email" />
          <input
            placeholder="Senha"
            type="password"
            class="validate"
            v-model="password"
          />
          <button
            type="button"
            class="waves-effect waves-light btn col s4"
            @click="login()"
          >
            Entrar
          </button>
          <router-link
            class="waves-effect waves-light btn col s4 orange offset-s1"
            to="/cadastro"
            >Cadastre-se</router-link
          >
        </GridVue>
      </div>
    </div>
  </LoginLayout>
</template>

<style>
.btn {
  margin-top: 5px;
}
</style>
<script>
import LoginLayout from "@/layouts/LoginLayout.vue";
import GridVue from "@/components/GridVue.vue";
import CardMenuVue from "@/components/CardMenuVue.vue";
import CardContentVue from "@/components/social/CardContentVue.vue";
import CardDetalhesVue from "@/components/social/CardDetalhesVue.vue";
import PublicContentVue from "@/components/social/PublicContentVue.vue";

import Vue from "vue";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
Vue.use(VueToast);

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
      email: "",
      password: "",
    };
  },
  methods: {
    
    login: function () {
      this.$http
        .post(`${this.$ApiUrl}api/v1/users/login`, {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          sessionStorage.setItem("user", JSON.stringify(response.data));
          this.$router.push('/');
          Vue.$toast.open({
            message: `Bem vindo ${response.data.name}!`,
            type: "success",
            position: "top-right",
          });
        })
        .catch((e) => {
          let resp = e.response.data.errors;
          for (let key in resp) {
            Vue.$toast.open({
              message: resp[key],
              type: "error",
              position: "top-right",
            });
          }
        });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
