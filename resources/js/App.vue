<template>
  <div>
    <router-view :key="$route.path"></router-view>
  </div>
</template>

<script>
import AOS from 'aos';
import 'aos/dist/aos.css';
export default {
  props: ["user"],
  created() {
    console.log(this.user);
    this.$store.commit("setUserLoginStatus", this.user);
     AOS.init();
  }
};
</script>

<style lang="scss">
</style>
