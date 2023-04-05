<template>
  <v-menu bottom min-width="200px" rounded offset-y>
    <template v-slot:activator="{ on }">
      <v-btn icon v-on="on">
        <v-avatar color="white" size="45">
          <img
            :src="$page.props.user.profile_photo_url"
            :alt="$page.props.user.name"
            contain
          />
        </v-avatar>
      </v-btn>
    </template>
    <v-card>
      <v-list-item-content class="justify-center">
        <div class="mx-auto text-center">
          <v-avatar color="brown">
            <img
              :src="$page.props.user.profile_photo_url"
              :alt="$page.props.user.name"
            />
          </v-avatar>
          <h3>{{ $page.props.user.name }}</h3>
          <p class="caption mt-1">
            {{ $page.props.user.email }}
          </p>
          <v-divider class="my-3"></v-divider>

          <inertia-link
            :href="route('profile.show')"
            as="v-btn"
            depressed
            rounded
            text
          >
            Profile
          </inertia-link>
          <v-divider class="my-3"></v-divider>
          <inertia-link
            class="overline"
            :href="route('logout')"
            method="post"
            as="v-btn"
            depressed
            rounded
            text
          >
            Cerrar Sesion
          </inertia-link>
        </div>
      </v-list-item-content>
    </v-card>
  </v-menu>
</template>
<script>
export default {};
</script>
