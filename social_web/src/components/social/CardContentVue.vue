<template>
   <GridVue width="12">
    <div class="card">
      <div class="card-content">
        <div class="row valign-wrapper">
          <div class="col s2">
            <img
              src="https://materializecss.com/images/yuna.jpg"
              alt=""
              class="circle responsive-img"
            />
            <!-- notice the "circle" class -->
          </div>
          <div class="col s10">
            <strong>{{ name }}</strong> - <small>{{ date_publish }}</small>
          </div>
        </div>
        <slot></slot>
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

export default {
  name: "CardContentVue",
  components: {
    GridVue,
  },
  props: ["name", "image", "date_publish"],
  data() {
    return {};
  },
  mounted() {
    
  },
  methods: {
    
  },
};
</script>
