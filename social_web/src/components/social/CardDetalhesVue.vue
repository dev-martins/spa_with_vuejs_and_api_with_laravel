<template>
  <span>
    <div class="card-image" v-if="image_content">
      <img :src="`${image_content}`" />
      <span class="card-title">{{ content_title }}</span>
    </div>
    <div class="card-content" v-if="content">
      <p>{{ content }}</p>
    </div>
  </span>
</template>

<script>
export default {
  name: "CardDetalhesVue",
  props: ["image_content","content_title", "content"],
  data() {
    return {};
  },
};
</script>
