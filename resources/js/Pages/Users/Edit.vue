<template>
  <v-container fluid class="title">
    <user-form></user-form>
  </v-container>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import UserForm from "@/Components/Users/Forms/UserForm.vue";

export default {
  name: "User.Edit",
  metaInfo: { title: "Nuevo Usuario" },
  layout: AppLayout,
  components: { UserForm },
  props: { users: Object },
  data() {
    return {};
  },
};
</script>
<style lang=""></style>
