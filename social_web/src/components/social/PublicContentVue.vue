<template>
  <GridVue class="input-field" width="12">
    <input v-model="title" type="text" class="validate" />
    <textarea
      v-if="title"
      v-model="input_content"
      id="content"
      class="materialize-textarea"
      placeholder="Conteúdo"
    ></textarea>
    <label>O que está acontecendo</label>
    <input
      v-if="input_content"
      v-model="link"
      placeholder="Link conteúdo"
      type="text"
      class="validate"
    />
    <input
      v-if="input_content"
      v-model="url"
      placeholder="Url da imagem"
      type="text"
      class="validate"
    />
    <button
      @click="registerContent()"
      v-if="input_content && title"
      class="waves-effect waves-light btn col s2 offset-s10"
    >
      Publicar
    </button>
  </GridVue>
</template>

<script>
import GridVue from "@/components/GridVue.vue";

import Vue from "vue";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

// mixins
// import getContent from "@/mixins/requests/getContent.js";
Vue.use(VueToast);

export default {
  name: "PublicContentVue",
  props: [],
  components: {
    GridVue,
  },
  data() {
    return {
      token: "",
      title: "",
      input_content: "",
      link: "",
      url: "",
      userImage: "",
      userName: "",
      contents: [],
    };
  },
  mounted() {
    this.getToken();
    this.getContent();
  },
  methods: {
    getToken() {
      this.token = this.$store.getters.getUser.token;
    },
    getContent() {
      this.$http
        .get(`${this.$ApiUrl}api/v1/users/content`, {
          headers: {
            Accept: "application/json",
            Authorization: `Bearer ${this.token}`,
            "Content-Type": "application/json",
          },
        })
        .then((response) => {
          this.$store.commit("setContent", response.data.content);
          this.contents = this.$store.getters.getContent;
          this.userImage = response.data.image;
          this.userName = response.data.name;
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
    registerContent() {
      this.$http
        .post(
          `${this.$ApiUrl}api/v1/users/content`,
          {
            title: this.title,
            content: this.input_content,
            link: this.link,
            image: this.url,
          },
          {
            headers: {
              Accept: "application/json",
              Authorization: `Bearer ${this.$store.getters.getUser.token}`,
              "Content-Type": "application/json",
            },
          }
        )
        .then((response) => {
          Vue.$toast.open({
            message: `Conteúdo cadastrado!`,
            type: "success",
            position: "top-right",
          });
          this.getContent();
        })
        .catch((e) => {
          let resp = e.response.data.errors;
          let msg = e.response.data.message;

          for (let key in resp) {
            Vue.$toast.open({
              message: resp[key],
              type: "error",
              position: "top-right",
            });
          }

          for (let key in msg) {
            Vue.$toast.open({
              message: msg[key],
              type: "error",
              position: "top-right",
            });
          }
        });
    },
  },
};
</script>
