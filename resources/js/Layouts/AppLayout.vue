<template>
  <v-app id="inspire">
    <the-layout-drawer></the-layout-drawer>
    <the-layout-app-bar></the-layout-app-bar>
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <!-- <v-col cols="12" sm="2">
            <v-sheet rounded="lg" min-height="268">
            </v-sheet>
          </v-col> -->

          <v-col cols="12" sm="12">
            <v-sheet min-height="70vh" rounded="lg">
              <slot />
            </v-sheet>
          </v-col>

          <!-- <v-col cols="12" sm="2">
            <v-sheet rounded="lg" min-height="268">
            </v-sheet>
          </v-col> -->
        </v-row>
      </v-container>
    </v-main>
    <portal-target name="modal" multiple></portal-target>
  </v-app>
</template>

<script>
import TheLayoutAppBar from "./TheLayoutAppBar.vue";
import TheLayoutDrawer from "./TheLayoutDrawer.vue";
export default {
  components: { TheLayoutDrawer, TheLayoutAppBar },
  name: "AppLayout",
  data: () => ({}),
  computed: {},
};
</script>
