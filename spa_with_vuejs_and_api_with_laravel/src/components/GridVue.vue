<template>
  <div :class="`col ${width}`">
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
