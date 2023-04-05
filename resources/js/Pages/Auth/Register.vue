<template>
  <v-container fluid fill-height class="loginOverlay">
    <v-layout flex align-center justify-center>
      <v-flex xs12 sm4 elevation-6>
        <v-toolbar class="primary darken-2 overline text-center">
          <v-toolbar-title class="white--text text-center">
            <h4>Registrar</h4>
          </v-toolbar-title>
        </v-toolbar>
        <v-card>
          <v-card-text class="pt-4">
            <div>
              <v-form ref="form" @submit.prevent="submit">
                <v-text-field
                  v-model="form.name"
                  label="Nombre"
                  :error-messages="errors.name"
                  required
                  outlined
                />
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
                <v-text-field
                  v-model="form.password_confirmation"
                  label="Contraseña"
                  :error-messages="errors.password_confirmation"
                  min="8"
                  :append-icon="e1 ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="e1 ? 'password' : 'text'"
                  counter
                  required
                  outlined
                  @click:append="() => (e1 = !e1)"
                />
                <v-checkbox
                  v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
                  id="terms"
                  v-model="form.terms"
                  label="Aceptar Terminos"
                  type="checkbox"
                />

                <v-layout justify-space-between>
                  <v-btn dark depressed block color="primary" type="submit">
                    Registrar
                  </v-btn>
                </v-layout>
              </v-form>
            </div>
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
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
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
  background: rgba(33, 150, 243, 0.3);
}

.photoCredit {
  position: absolute;
  bottom: 15px;
  right: 15px;
}
</style>
