<template>
  <modal
    :show="show"
    :max-width="maxWidth"
    :closeable="closeable"
    :fullscreen="fullscreen"
    @close="close"
  >
    <v-card>
      <v-card-title>
        <slot name="title"> </slot>
      </v-card-title>
      <v-card-text>
        <slot name="content"> </slot>
      </v-card-text>
      <v-card-actions class="grey lighten-3">
        <slot name="footer"> </slot>
      </v-card-actions>
    </v-card>
  </modal>
</template>

<script>
import Modal from "./Modal";

export default {
  emits: ["close"],

  components: {
    Modal,
  },

  props: {
    show: {
      default: false,
    },
    maxWidth: {
      default: 500,
    },
    closeable: {
      default: false,
    },
    fullscreen: {
      default: false,
    },
  },

  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>
