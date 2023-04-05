<template>
  <v-card color="grey lighten-3">
    <v-card-title>
      Browser Sessions
    </v-card-title>
    <v-card-subtitle
      >Manage and log out your active sessions on other browsers and
      devices.</v-card-subtitle
    >
    <v-card-text>
      <p>
        If necessary, you may log out of all of your other browser sessions
        across all of your devices. Some of your recent sessions are listed
        below; however, this list may not be exhaustive. If you feel your
        account has been compromised, you should also update your password.
      </p>
      <v-list
        v-if="sessions.length > 0"
        subheader
        two-line
        dense
        flat
        color="transparent"
      >
        <v-subheader class="overline">Navegadores</v-subheader>
        <v-list-item v-for="(session, i) in sessions" :key="i" dense>
          <v-list-item-avatar>
            <v-icon class="grey lighten-1" dark>
              mdi-monitor
            </v-icon>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title
              v-text="`${session.agent.platform}-${session.agent.browser}`"
            ></v-list-item-title>

            <v-list-item-subtitle>
              <div class="text-xs text-gray-500">
                {{ session.ip_address }},
                <span
                  v-if="session.is_current_device"
                  class="green--text font-weight-bold"
                >
                  This device
                </span>
                <span v-else>Last active {{ session.last_active }}</span>
              </div>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-card-text>
    <v-card-actions>
      <v-btn @click="confirmLogout" block color="primary">
        Log Out Other Browser Sessions
      </v-btn>
    </v-card-actions>

    <dialog-modal :show="confirmingLogout" @close="closeModal">
      <template #title>
        Log Out Other Browser Sessions
      </template>
      <template #content>
        Please enter your password to confirm you would like to log out of your
        other browser sessions across all of your devices.
        <div class="mt-4">
          <v-text-field
            type="password"
            class="mt-1"
            outlined
            dense
            :error-messages="form.errors.password"
            placeholder="Password"
            ref="password"
            v-model="form.password"
            @keyup.enter="logoutOtherBrowserSessions"
          />
        </div>
      </template>

      <template #footer>
        <v-spacer></v-spacer>
        <v-btn @click="closeModal">
          Cancel
        </v-btn>
        <v-btn
          class="ml-2"
          @click="logoutOtherBrowserSessions"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
          color="error"
        >
          Log Out Other Browser Sessions
        </v-btn>
      </template>
    </dialog-modal>
  </v-card>
</template>

<script>
import DialogModal from "../../Components/DialogModal.vue";
export default {
  props: ["sessions"],

  components: {
    DialogModal,
    // JetDialogModal,
  },

  data() {
    return {
      confirmingLogout: false,

      form: this.$inertia.form({
        password: "",
      }),
    };
  },

  methods: {
    confirmLogout() {
      this.confirmingLogout = true;

      //   setTimeout(() => this.$refs.password.focus(), 250);
    },

    logoutOtherBrowserSessions() {
      this.form.delete(route("other-browser-sessions.destroy"), {
        preserveScroll: true,
        onSuccess: () => this.closeModal(),
        onError: () => this.$refs.password.focus(),
        onFinish: () => this.form.reset(),
      });
    },

    closeModal() {
      this.confirmingLogout = false;
      this.form.reset();
    },
  },
};
</script>
