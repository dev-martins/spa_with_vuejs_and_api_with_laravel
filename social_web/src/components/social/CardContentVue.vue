<template>
  <GridVue width="12">
    <div class="card" v-for="content in contentList" :key="content.id">
      <div class="card-content">
        <div class="row valign-wrapper">
          <div class="col s2">
            <img :src="userImage" alt="" class="circle responsive-img" />
          </div>
          <div class="col s10">
            <strong>{{ userName }}</strong> -
            <small>{{ convertDateTime(content.created_at) }}</small>
          </div>
        </div>
        <CardDetalhesVue
          :image_content="content.image"
          :content_title="content.title"
          :content="content.content"
        >
        </CardDetalhesVue>
      </div>
      <div class="card-action">
        <i class="material-icons">favorite_border</i>
        <i class="material-icons">insert_comment</i>
      </div>
    </div>
  </GridVue>
</template>

<script>
import GridVue from "@/components/GridVue.vue";
import CardDetalhesVue from "@/components/social/CardDetalhesVue.vue";

// mixins
import convertDateTime from "@/mixins/convertDateTime.js";
import getContent from "@/mixins/requests/getContent.js";

export default {
  name: "CardContentVue",
  mixins: [convertDateTime, getContent],
  components: {
    GridVue,
    CardDetalhesVue,
  },
  props: ["name", "image", "date_publish"],
  data() {
    return {
      token: "",
      userImage: "",
      userName: "",
      contents: [],
    };
  },
  computed: {
    contentList() {
      return this.$store.getters.getContent;
    },
  },
  mounted() {
    this.getToken();
    this.getContent();
  },
  methods: {
    getToken() {
      this.token = this.$store.getters.getUser.token;
    },
  },
};
</script>
