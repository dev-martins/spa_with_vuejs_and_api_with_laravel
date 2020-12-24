<template>
  <LoginLayout>
    <div class="container">
      <div class="row valign-wrapper">
        <GridVue width="4">
          <CardMenuVue>
            <img class="responsive-img" src="@/assets/social/avatar.png" />
          </CardMenuVue>
        </GridVue>
        <GridVue width="8">
          <h3>Perfil</h3>
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
          <a @click="updatePerfil()" class="waves-effect waves-light btn col s3"
            >Enviar</a
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
import LoginLayout from "@/layouts/SiteLayout.vue";
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
  name: "Perfil",
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
      image:"",
      password_confirmation: "",
    };
  },
  mounted() {
      this.getUser();
  },
  methods: {
    getUser: function () {
      let userAuth = sessionStorage.getItem("user");
      if (userAuth) {
        this.user = JSON.parse(userAuth);
        this.name = this.user.name
        this.email = this.user.email
        this.image = this.user.image
      } else {
        this.$router.push("/login");
      }
    },
    updatePerfil: function () {
      axios
        .post(`http://127.0.0.1:8000/api/v1/perfil`, {
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
