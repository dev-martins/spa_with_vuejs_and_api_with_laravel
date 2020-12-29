<template>
  <SiteLayout>
    <div class="container">
      <div class="row">
        <GridVue width="4">
          <CardMenuVue background="grey lighten-5 z-depth-1">
            <GridVue width="4">
              <img
                :src="image"
                :alt="name"
                class="circle responsive-img"
              />
              <!-- notice the "circle" class -->
            </GridVue>
            <GridVue width="8">
              <h5>{{name}}</h5>
            </GridVue>
          </CardMenuVue>
        </GridVue>
        <GridVue width="8">
          <div class="row">
            <GridVue class="input-field" width="12">
              <PublicContentVue />
            </GridVue>
          </div>
          <div class="row">
            <GridVue width="12">
              <CardContentVue
                image="https://materializecss.com/images/sample-1.jpg"
                name="Marta Silva"
                date_publish="28/11/2020 16:40"
              >
                <CardDetalhesVue
                  image_content="https://materializecss.com/images/sample-1.jpg"
                  content_title="Lorem ipsum dolor sit amet"
                  content="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec egestas venenatis ligula sit amet luctus. Ut consequat non turpis ac tincidunt."
                >
                </CardDetalhesVue>
              </CardContentVue>
            </GridVue>
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
import CardDetalhesVue from "@/components/social/CardDetalhesVue.vue";
import PublicContentVue from "@/components/social/PublicContentVue.vue";

export default {
  name: "HelloWorld",
  components: {
    SiteLayout,
    GridVue,
    CardMenuVue,
    CardContentVue,
    CardDetalhesVue,
    PublicContentVue,
  },
  data() {
    return {
      name:"",
      image:"",
    };
  },
  mounted(){
    this.getUser();
  },
  methods: {
    getUser: function () {
      let userAuth = sessionStorage.getItem("user");
      if (userAuth) {
        this.user = JSON.parse(userAuth);
        this.name = this.user.name;
        this.image = this.user.image;
      } else {
        this.$router.push("/login");
      }
    }
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
