<template>
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
</template>

<script>
export default {
  name: "CardContentVue",
  props: ["name", "image", "date_publish"],
  data() {
    return {};
  },
};
</script>
