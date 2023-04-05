<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12" md="4">
        <!-- <v-card class="mx-auto" max-width="434" tile dark>
          <v-img
            height="100%"
            src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg"
          ></v-img>
          <v-col>
            <v-avatar size="50" style="position: absolute; top: 130px;">
              <img :src="users.profile_photo_url" :alt="users.name" contain />
            </v-avatar>
          </v-col>
        </v-card> -->
        <v-card class="mx-auto" tile dark>
          <v-toolbar
            extended
            flat
            src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
            prominent
          >
            <template v-slot:extension>
              <v-fab-transition>
                <v-btn
                  v-show="users.profile_photo_url"
                  fab
                  dark
                  small
                  absolute
                  bottom
                  disabled
                >
                  <v-avatar>
                    <img
                      :src="users.profile_photo_url"
                      :alt="users.name"
                      contain
                    />
                  </v-avatar>
                </v-btn>
              </v-fab-transition>
            </template>
          </v-toolbar>
          <v-list-item color="rgba(0, 0, 0, .4)">
            <v-list-item-content>
              <v-list-item-title class="title pt-6">
                {{ users.name }}
              </v-list-item-title>
              <v-list-item-subtitle>{{ users.email }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-card>
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
    </v-row>
    <!-- <v-card class="mr-auto mt-6" max-width="1000" tile>
      <v-img
        height="200"
        src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg"
      ></v-img>
      <v-row style="margin: 2.5%; position: absolute; top: 130px;">
        <v-list-item>
          <v-list-item-avatar size="100">
            <img
              src="https://www.w3schools.com/howto/img_avatar.png"
              alt="John"
            />
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title class="title" style="margin-top: 20px;"
              >Injamamul Haque Sonet</v-list-item-title
            >
            <v-list-item-subtitle
              >Software Engineer | dokanee</v-list-item-subtitle
            >
          </v-list-item-content>
        </v-list-item>
      </v-row>
    </v-card> -->
  </v-container>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
export default {
  name: "Users.show",
  metaInfo() {
    return {
      title: `${this.users.name}`,
    };
  },
  props: {
    users: Object,
  },
  layout: AppLayout,
  mounted() {
    const _this = this;
    _this.$events.$emit("breadcrumbs", [
      { text: "Usuarios", disabled: false, href: "users.index" },
      { text: _this.users.name, disabled: true },
    ]);
  },
  data() {
    return {};
  },
};
</script>
