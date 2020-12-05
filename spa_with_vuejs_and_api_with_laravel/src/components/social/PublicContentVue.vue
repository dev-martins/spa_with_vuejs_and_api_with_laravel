<template>
  <GridVue class="input-field" width="12">
    <textarea v-model="input_content" id="textarea1" class="materialize-textarea"></textarea>
    <label for="textarea1">O que está acontecendo</label>
    <a v-if="input_content" class="waves-effect waves-light btn col s2 offset-s10">Publicar</a>
  </GridVue>
</template>

<script>
import GridVue from "@/components/GridVue.vue";

export default {
  name: "PublicContentVue",
  props: [],
  components: {
    GridVue,
  },
  data() {
    return {
        input_content:""
    };
  },
};
</script>
