<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12" md="4">
        <v-skeleton-loader
          type="card-avatar, article, actions"
        ></v-skeleton-loader>

        <v-skeleton-loader type="date-picker"></v-skeleton-loader>
      </v-col>

      <v-col cols="12" md="4">
        <v-skeleton-loader type="article, actions" dark></v-skeleton-loader>

        <v-skeleton-loader
          type="table-heading, list-item-two-line, image, table-tfoot"
        ></v-skeleton-loader>
      </v-col>

      <v-col cols="12" md="4">
        <v-skeleton-loader
          type="list-item-avatar, divider, list-item-three-line, card-heading, image, actions"
        ></v-skeleton-loader>

        <v-skeleton-loader
          type="list-item-avatar-three-line, image, article"
          dark
        ></v-skeleton-loader>
      </v-col>

      <v-col cols="12">
        <v-skeleton-loader type="table" dark></v-skeleton-loader>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Layout from "@/Layouts/AppLayout.vue";
export default {
  name: "Dashboard",
  metaInfo: { title: "Dashboard" },
  layout: (h, page) => h(Layout, [page]),
  mounted() {
    this.$events.$emit("breadcrumbs", []);
  },
  data: () => ({
    links: ["Dashboard"],
    attrs: {
      class: "mb-6",
      boilerplate: true,
      elevation: 2,
    },
  }),
};
</script>
