<template>
  <div :class="`col s${width}`">
      <slot></slot>
  </div>
</template>

<script>
export default {
  name: "GridVue",
  props: ["width"],
  data() {
    return {};
  },
};
</script>
