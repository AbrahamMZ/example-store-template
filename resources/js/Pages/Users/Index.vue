<template>
  <v-container fluid>
    <v-data-table
      :headers="headers"
      :items="users.data"
      :items-per-page="parseInt(users.per_page)"
      :server-items-length="users.total"
      :options.sync="pagination"
      sort-by="key"
      class="elevation-1 blue--text"
      caption
      dense
      dark
    >
      <template #top>
        <v-toolbar flat>
          <v-text-field
            v-model="pagination.search"
            label="Search"
            append-icon="mdi-magnify"
            hide-details
            clearable
            outlined
            filled
            dense
          ></v-text-field>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <v-btn icon>
            <v-icon>mdi-printer</v-icon>
          </v-btn>

          <v-btn icon>
            <v-icon color="green">mdi-file-excel</v-icon>
          </v-btn>

          <v-btn icon>
            <v-icon>mdi-reload</v-icon>
          </v-btn>
        </v-toolbar>
        <v-toolbar flat>
          <v-spacer></v-spacer>
          <inertia-link
            :href="route('users.create')"
            as="v-btn"
            color="primary"
            depressed
            rounded
          >
            registrar usuario <v-icon right>mdi-account-plus</v-icon>
          </inertia-link>
        </v-toolbar>
      </template>
      <template #[`item.actions`]="{item}">
        <v-btn icon small @click="edit(item.id)">
          <v-icon small>mdi-eye</v-icon>
        </v-btn>

        <v-btn icon small>
          <v-icon color="green" small>mdi-pencil</v-icon>
        </v-btn>

        <v-btn icon small>
          <v-icon small color="error">mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { mapValues, pickBy, throttle } from "lodash";
export default {
  name: "Users",
  metaInfo: { title: "Users" },
  props: {
    users: Object,
    filters: Object,
  },
  layout: AppLayout,
  mounted() {
    this.$events.$emit("breadcrumbs", [{ text: "Usuarios", disabled: true }]);
  },
  data() {
    return {
      pagination: {
        search: this.filters.search,
        page: 1,
        itemsPerPage: 10,
      },
      headers: [
        {
          text: "id",
          align: "start",
          value: "key",
        },
        { text: "Nombre", value: "name" },
        { text: "Email", value: "email" },
        { text: "Telefono", value: "phones" },
        { text: "Acciones", value: "actions", align: "right", sortable: false },
      ],
    };
  },
  watch: {
    pagination: {
      handler: throttle(function () {
        const _this = this;
        let query = pickBy(_this.pagination);
        _this.$inertia.replace(
          _this.route(
            "users.index",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 1200),
      deep: true,
    },
  },
  methods: {
    edit(_user_id) {
      this.$inertia.visit(this.route("users.show", _user_id));
    },
  },
};
</script>
