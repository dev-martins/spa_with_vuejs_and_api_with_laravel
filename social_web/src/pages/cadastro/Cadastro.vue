<template>
  <LoginLayout>
    <div class="container">
      <div class="row valign-wrapper">
        <GridVue width="6">
          <CardMenuVue>
            <img class="responsive-img" src="@/assets/social/register.jpg" />
          </CardMenuVue>
        </GridVue>
        <GridVue width="6">
          <h3>Cadastro</h3>
          <input v-model="name" placeholder="Nome" type="text" class="validate" />
          <input v-model="email" placeholder="Email" type="text" class="validate" />
          <input
            v-model="password"
            placeholder="Senha"
            type="password"
            class="validate"
          />
          <input
            v-model="password_confirmation"
            placeholder="Confirme senha"
            type="password"
            class="validate"
          />
          <a @click="register()" class="waves-effect waves-light btn col s3">Enviar</a>
          <router-link
            class="waves-effect waves-light btn col s4 orange offset-s1"
            to="/login"
            >Já tenho conta</router-link
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

import axios from "axios";
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
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    };
  },
  methods: {
    register: function () {
      axios
        .post(`http://127.0.0.1:8000/api/v1/users`, {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        })
        .then((response) => {
          sessionStorage.setItem("user", JSON.stringify(response.data));
          this.$router.push("/");
          Vue.$toast.open({
            message: `${response.data.name} cadastrado com sucesso!`,
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
