<template>
  <v-navigation-drawer
    app
    left
    permanent
    dark
    width="250"
    mini-variant
    expand-on-hover
  >
    <the-layout-drawer-list dense :routes="$page.props.MenusDrawer" icon-show />
  </v-navigation-drawer>
</template>

<script>
import TheLayoutDrawerList from "./TheLayoutDrawerList.vue";

export default {
  name: "TheLayoutDrawer",
  components: {
    TheLayoutDrawerList,
  },
  data: () => ({}),
  computed: {},
  methods: {
    // stateNavbarShow(state) {
    //   //   this.$store.dispatch('NavbarState', { state });
    // },
  },
};
</script>
