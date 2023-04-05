<template>
  <v-container fluid fill-height class="loginOverlay">
    <v-layout flex align-center justify-center>
      <v-flex xs12 sm4 elevation-6>
        <v-toolbar class="primary overline text-center">
          <v-toolbar-title class="white--text text-center">
            <h4>Iniciar Sesion</h4>
          </v-toolbar-title>
        </v-toolbar>
        <v-card>
          <v-card-text class="pt-4">
            <!-- <div> -->
            <v-form ref="form" @submit.prevent="submit">
              <v-text-field
                v-model="form.email"
                label="Correo Electronico"
                :error-messages="errors.email"
                required
                outlined
              />
              <v-text-field
                v-model="form.password"
                label="Contraseña"
                :error-messages="errors.password"
                min="8"
                :append-icon="e1 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="e1 ? 'password' : 'text'"
                counter
                required
                outlined
                @click:append="() => (e1 = !e1)"
              />
              <v-checkbox
                id="remember"
                v-model="form.remember"
                label="Recuerdame"
                type="checkbox"
              />
              <!-- <v-layout justify-space-between> -->
              <v-btn dark depressed block color="primary" type="submit">
                Login
              </v-btn>
              <!-- </v-layout> -->
            </v-form>
            <!-- </div> -->
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import Layout from "@/Layouts/Default";

export default {
  name: "Login",
  metaInfo: { title: "Login" },
  layout: (h, page) => h(Layout, [page]),
  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      e1: true,
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
  computed: {
    errors() {
      return this.$page.props.errors;
    },

    hasErrors() {
      return Object.keys(this.errors).length > 0;
    },
  },
};
</script>
<style>
#login {
  background-image: url("https://images.unsplash.com/photo-1497733942558-e74c87ef89db?dpr=1&auto=compress,format&fit=crop&w=1650&h=&q=80&cs=tinysrgb&crop=");
  background-size: cover;
  overflow: hidden;
}

.loginOverlay {
  background: rgba(120, 182, 240, 0.295);
}

.photoCredit {
  position: absolute;
  bottom: 15px;
  right: 15px;
}
</style>
