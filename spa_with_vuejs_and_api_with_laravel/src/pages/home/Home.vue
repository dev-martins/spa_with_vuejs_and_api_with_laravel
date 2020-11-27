<template>
  <div class="container">
    <div class="row">
      <grid-vue width="s4">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s4">
              <img src="https://materializecss.com/images/yuna.jpg" alt="" class="circle responsive-img" />
              <!-- notice the "circle" class -->
            </div>
            <div class="col s8">
              <h5>Marta Silva</h5>
              <span class="black-text">
                This is a square image. Add the "circle" class to it to make it
                appear circular.
              </span>
            </div>
          </div>
        </div>
      </grid-vue>
      <grid-vue width="s8">
        <h1>Social</h1>
        <div class="row">
          <div class="col s12 m6">
            <div class="card blue-grey darken-1">
              <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>
                  I am a very simple card. I am good at containing small bits of
                  information. I am convenient because I require little markup
                  to use effectively.
                </p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
                <a href="#">This is a link</a>
              </div>
            </div>
          </div>
        </div>
      </grid-vue>
    </div>
  </div>
</template>

<script>
import GridVue from "@/components/GridVue.vue";

export default {
  name: "HelloWorld",
  components: {
    GridVue,
  },
  data() {
    return {
      msg: "Welcome to Your Vue.js App",
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
