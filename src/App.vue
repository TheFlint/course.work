<template>
  <v-app style="background: none">
    <v-container>
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
    background: url('./assets/images/background.png') no-repeat center center fixed;
    background-size: cover;

    &:after {
      content: '';
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background-color: $background-tint;
      opacity: .3;
      z-index: -1;
    }
  }
</style>
