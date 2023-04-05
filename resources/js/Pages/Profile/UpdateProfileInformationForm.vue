<template>
  <form @submit.prevent="updateProfileInformation">
    <v-card color="grey lighten-3">
      <v-card-title>Profile</v-card-title>
      <v-card-subtitle>Informacion del usuario</v-card-subtitle>
      <v-card-text>
        <v-text-field
          v-model="form.name"
          :error-messages="form.errors.name"
          label="Name"
          required
        ></v-text-field>
        <v-text-field
          v-model="form.email"
          :error-messages="form.errors.email"
          label="E-mail"
          required
        ></v-text-field>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn disabled text v-show="form.recentlySuccessful" class="mr-3">
          Guardado...
        </v-btn>
        <v-btn
          class="mr-4"
          color="primary"
          type="submit"
          :loading="form.processing"
          :disabled="form.processing"
        >
          Guardar
        </v-btn>
      </v-card-actions>
    </v-card>
  </form>
</template>

<script>
export default {
  props: ["user"],

  data() {
    return {
      form: this.$inertia.form({
        _method: "PUT",
        name: this.user.name,
        email: this.user.email,
        photo: null,
      }),

      photoPreview: null,
    };
  },

  methods: {
    updateProfileInformation() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }

      this.form.post(route("user-profile-information.update"), {
        errorBag: "updateProfileInformation",
        preserveScroll: true,
      });
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },

    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
    },

    deletePhoto() {
      this.$inertia.delete(route("current-user-photo.destroy"), {
        preserveScroll: true,
        onSuccess: () => (this.photoPreview = null),
      });
    },
  },
};
</script>
