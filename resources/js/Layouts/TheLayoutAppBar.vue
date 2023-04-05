<template>
  <v-app-bar app color="white" flat dense>
    <!-- <v-app-bar-nav-icon @click="drawer = !drawer">
      <v-icon>{{ toggleNavbarIcon }}</v-icon>
    </v-app-bar-nav-icon> -->
    <the-layout-breadcrumbs></the-layout-breadcrumbs>

    <!-- <v-avatar
        :color="$vuetify.breakpoint.smAndDown ? 'grey darken-1' : 'transparent'"
        size="32"
      ></v-avatar> -->

    <!-- <v-tabs centered class="ml-n9" color="grey darken-1">
      <v-tab v-for="(link, i) in menu" :key="i">
        {{ link.label }}
      </v-tab>
    </v-tabs> -->
    <v-spacer></v-spacer>
    <profile></profile>
  </v-app-bar>
</template>
<script>
import Profile from "@/widget/Profile.vue";
import TheLayoutBreadcrumbs from "./TheLayoutBreadcrumbs.vue";
export default {
  name: "AppBar",
  components: { Profile, TheLayoutBreadcrumbs },
  data() {
    return {
      drawer: null,
      right: null,
      breadcrumbs: [],
    };
  },
  computed: {
    menu() {
      return this.$page.props.tabs;
    },
    toggleNavbarIcon() {
      return this.drawer
        ? "mdi-format-indent-decrease"
        : "mdi-format-indent-increase";
    },
  },
};
</script>
<style lang=""></style>
