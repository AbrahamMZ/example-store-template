<template>
  <Portal to="modal">
    <v-dialog
      transition="dialog-bottom-transition"
      v-model="show"
      :width="maxWidth"
      :persistent="!closeable"
      :fullscreen="fullscreen"
    >
      <div v-show="show">
        <slot v-if="show"></slot>
      </div>
    </v-dialog>
  </Portal>
</template>

<script>
export default {
  emits: ["close"],
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
  mounted() {
    const _this = this;
    document.addEventListener("keydown", _this.closeOnEscape);
  },
  unmounted() {
    const _this = this;
    document.removeEventListener("keydown", _this.closeOnEscape);
  },
  methods: {
    close() {
      if (props.closeable) {
        emit("close");
      }
    },
    closeOnEscape(e) {
      if (e.key === "Escape" && props.show) {
        this.close();
      }
    },
  },
};
</script>
