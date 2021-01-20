<template>
  <SiteLayout>
    <div class="container">
      <div class="row">
        <GridVue width="4">
          <CardMenuVue background="grey lighten-5 z-depth-1">
            <GridVue width="4">
              <img
                v-if="user.image"
                class="circle responsive-img"
                :src="user.image"
                :alt="user.name"
              />
              <img
                v-else
                class="circle responsive-img"
                src="@/assets/social/avatar.png"
              />
              <!-- notice the "circle" class -->
            </GridVue>
            <GridVue width="8">
              <h5>{{ user.name }}</h5>
            </GridVue>
          </CardMenuVue>
        </GridVue>
        <GridVue width="8">
          <div class="row">
            <GridVue class="input-field" width="12">
              <PublicContentVue> </PublicContentVue>
            </GridVue>
          </div>
          <div class="row">
            <CardContentVue>
              
            </CardContentVue>
          </div>
        </GridVue>
      </div>
    </div>
  </SiteLayout>
</template>

<script>
import SiteLayout from "@/layouts/SiteLayout.vue";
import GridVue from "@/components/GridVue.vue";
import CardMenuVue from "@/components/CardMenuVue.vue";
import CardContentVue from "@/components/social/CardContentVue.vue";
import PublicContentVue from "@/components/social/PublicContentVue.vue";

export default {
  name: "HelloWorld",
  components: {
    SiteLayout,
    GridVue,
    CardMenuVue,
    CardContentVue,
    PublicContentVue,
  },
  data() {
    return {
      user: false,
    };
  },
  mounted() {
    this.getUser();
  },
  methods: {
    getUser: function () {
      let userAuth = this.$store.getters.getUser;
      if (userAuth) {
        this.user = this.$store.getters.getUser;
      } else {
        this.$router.push("/login");
      }
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped></style>
