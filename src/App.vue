<template>
  <v-app style="background: none">
    <v-container style="padding: 0;">
      <router-view />
    </v-container>
  </v-app>
</template>
<script>
  export default {
    name: 'App',
    metaInfo: {
      // if no subcomponents specify a metaInfo.title, this title will be used
      title: 'Default Title',
      // all titles will be injected into this template
      titleTemplate: '%s | My Awesome Webapp'
    }
  }
</script>




<style lang="scss">
  @import "./assets/styles";

  body {
    margin: 0;
    padding: 0;
    background: url('./assets/images/background.png') no-repeat center center fixed;
    background-size: cover;
  }
</style>
