<template>
  <div :class="`card-panel ${background}`">
    <div class="row valign-wrapper">
        <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardMenuVue",
  props: ['background'],
  data() {
    return {};
  },
};
</script>
