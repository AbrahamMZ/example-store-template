<template>
  <v-container fluid>
    <v-row>
      <v-col
        cols="12"
        sm="4"
        v-if="$page.props.jetstream.canUpdateProfileInformation"
      >
        <update-profile-information-form :user="$page.props.user" />
      </v-col>
      <v-col cols="12" sm="4" v-if="$page.props.jetstream.canUpdatePassword">
        <update-password-form />
      </v-col>
      <v-col cols="12" sm="4">
        <logout-other-browser-sessions-form
          :sessions="sessions"
        ></logout-other-browser-sessions-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import UpdatePasswordForm from "./UpdatePasswordForm";
import UpdateProfileInformationForm from "./UpdateProfileInformationForm";
import LogoutOtherBrowserSessionsForm from "./LogoutOtherBrowserSessionsForm.vue";

export default {
  name: "ShowProfile",
  metaInfo: { title: "Profile" },
  layout: (h, page) => h(AppLayout, [page]),
  props: ["sessions"],
  components: {
    UpdatePasswordForm,
    UpdateProfileInformationForm,
    LogoutOtherBrowserSessionsForm,
  },

  mounted() {
    this.$events.$emit("breadcrumbs", [{ text: "Profile", disabled: true }]);
  },
};
</script>
