<template>
  <form @submit.prevent="updatePassword">
    <v-card color="grey lighten-3">
      <v-card-title>Cambio de Contraseña</v-card-title>
      <v-card-subtitle
        >Ensure your account is using a long, random password to stay
        secure.</v-card-subtitle
      >
      <v-card-text>
        <v-text-field
          v-model="form.current_password"
          label="Contraseña Actual"
          :error-messages="form.errors.current_password"
          min="8"
          :append-icon="e1 ? 'mdi-eye' : 'mdi-eye-off'"
          :type="e1 ? 'password' : 'text'"
          counter
          required
          outlined
          @click:append="() => (e1 = !e1)"
        />
        <v-text-field
          v-model="form.password"
          label="Nueva Contraseña"
          :error-messages="form.errors.password"
          min="8"
          :append-icon="e2 ? 'mdi-eye' : 'mdi-eye-off'"
          :type="e2 ? 'password' : 'text'"
          counter
          required
          outlined
          @click:append="() => (e2 = !e2)"
        />
        <v-text-field
          v-model="form.password_confirmation"
          label="Confimar Contraseña"
          :error-messages="form.errors.password_confirmation"
          min="8"
          :append-icon="e3 ? 'mdi-eye' : 'mdi-eye-off'"
          :type="e3 ? 'password' : 'text'"
          counter
          required
          outlined
          @click:append="() => (e3 = !e3)"
        />
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn disabled text v-show="form.recentlySuccessful" class="mr-3">
          Actualizado...
        </v-btn>
        <v-btn class="mr-4" color="primary" type="submit">
          Guardar
        </v-btn>
      </v-card-actions>
    </v-card>
  </form>
</template>

<script>
export default {
  components: {},

  data() {
    return {
      e1: true,
      e2: true,
      e3: true,
      form: this.$inertia.form({
        current_password: "",
        password: "",
        password_confirmation: "",
      }),
    };
  },

  methods: {
    updatePassword() {
      this.form.put(route("user-password.update"), {
        errorBag: "updatePassword",
        preserveScroll: true,
        onSuccess: () => this.form.reset(),
        onError: () => {
          if (this.form.errors.password) {
            this.form.reset("password", "password_confirmation");
            this.$refs.password.focus();
          }

          if (this.form.errors.current_password) {
            this.form.reset("current_password");
            this.$refs.current_password.focus();
          }
        },
      });
    },
  },
};
</script>
