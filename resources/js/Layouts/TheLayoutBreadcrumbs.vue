<template>
  <v-breadcrumbs :items="items" class="overline">
    <template v-slot:item="{ item }">
      <inertia-link
        as="v-breadcrumbs-item"
        :href="item.href ? route(item.href) : ''"
        :disabled="item.disabled"
        tag="a"
      >
        {{ item.text }}
      </inertia-link>
    </template>
  </v-breadcrumbs>
</template>
<script>
export default {
  name: "BreadcrumbsApp",
  mounted() {
    const _this = this;
    _this.$events.$on(["breadcrumbs"], function (items) {
      items.unshift({ text: "Dashboard", href: "dashboard", disable: false });
      _this.items = items;
    });
  },
  data() {
    return {
      items: [],
    };
  },
};
</script>
<style lang=""></style>
