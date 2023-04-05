<template>
  <v-container fluid class="title">
    <user-form v-model="valid" ref="form" :form.sync="form"></user-form>
    <v-btn
      :disabled="!valid"
      color="success"
      class="mr-4"
      @click="validate"
      type="submit"
    >
      Validate
    </v-btn>

    <v-btn color="error" class="mr-4" @click="reset">
      Reset Form
    </v-btn>

    <v-btn color="warning" @click="resetValidation">
      Reset Validation
    </v-btn>
  </v-container>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import UserForm from "@/Components/Users/Forms/UserForm.vue";

export default {
  name: "User.Create",
  metaInfo: { title: "Nuevo Usuario" },
  layout: AppLayout,
  components: { UserForm },
  props: {},
  remember: "form",
  mounted() {
    this.$events.$emit("breadcrumbs", [
      { text: "Usuarios", disabled: false, href: "users.index" },
      { text: "Registrar", disabled: true },
    ]);
  },
  data() {
    return {
      valid: true,
      form: {
        name: "",
        email: "",
        checkbox: false,
        select: null,
      },
    };
  },
  methods: {
    validate() {
      this.$refs.form.$refs.formUser.validate();
    },
    reset() {
      this.$refs.form.$refs.formUser.reset();
    },
    resetValidation() {
      this.$refs.form.$refs.formUser.resetValidation();
    },
  },
};
</script>
<style lang=""></style>
