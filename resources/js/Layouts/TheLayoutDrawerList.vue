<template>
  <v-list :dense="dense" class="layout-drawer">
    <div
      v-for="(item, i) in routes.filter((item) => !item.hidden)"
      :key="`nav-${i}`"
    >
      <inertia-link
        v-if="isVisibleItem(item)"
        :href="route(onlyOneChild.name)"
        as="v-list-item"
        ripple="ripple"
      >
        <v-list-item-icon class="layout-drawer__icon">
          <v-icon :color="route().current(onlyOneChild.name) ? 'primary' : ''">
            {{ getListIcon(onlyOneChild) }}
          </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>
            {{ getListTitle(onlyOneChild) }}
          </v-list-item-title>
        </v-list-item-content>
      </inertia-link>

      <v-list-group
        v-else
        :prepend-icon="getListIcon(item)"
        :key="`nav-${i}`"
        :value="true"
      >
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title>
              {{ getListTitle(item) }}
            </v-list-item-title>
          </v-list-item-content>
        </template>

        <the-layout-drawer-list
          :dense="dense"
          :routes="item.children"
          :base-path="resolvePath(item.path)"
          icon-show
        />
      </v-list-group>
    </div>
  </v-list>
</template>

<script>
import { resolve } from "path";

export default {
  name: "TheLayoutDrawerList",
  props: {
    dense: Boolean,
    iconShow: Boolean,
    isNest: Boolean,
    routes: {
      type: Array,
      default: () => {},
    },
    basePath: {
      type: String,
      default: "",
    },
  },
  data() {
    this.onlyOneChild = null;
    return {};
  },
  methods: {
    isExternal(path) {
      return /^(https?:|mailto:|tel:)/.test(path);
    },
    isVisibleItem(item) {
      return (
        this.hasOneVisibleChild(item.children, item) &&
        (!this.onlyOneChild.children || this.onlyOneChild.noVisibleChildren) &&
        !item.alwaysShow
      );
    },
    hasOneVisibleChild(children = [], parent) {
      const visibleChildren = children.filter((item) => {
        if (item.hidden) return false;
        // Temp set(will be used if only has one visible child)
        this.onlyOneChild = item;
        return true;
      });

      // When there is only one child router, the child router is displayed by default
      if (visibleChildren.length === 1) {
        this.onlyOneChild.path = resolve(parent.path, this.onlyOneChild.path);
        this.onlyOneChild.meta.icon =
          this.onlyOneChild.meta.icon || parent.meta.icon || "";

        return true;
      }

      // Show parent if there are no child router to display
      if (visibleChildren.length === 0) {
        this.onlyOneChild = { ...parent, noVisibleChildren: true };
        return true;
      }

      return false;
    },
    resolvePath(path) {
      if (this.isExternal(path)) {
        return path;
      }
      return resolve(this.basePath, path);
    },
    getListIcon(item) {
      return this.iconShow && item.meta ? item.meta.icon : " ";
    },
    getListTitle(item) {
      return item.meta ? item.meta.title : "";
    },
  },
};
</script>

<style>
.layout-drawer {
  padding-bottom: 0px;
  padding-top: 0px;
}
.layout-drawer__icon {
  margin-bottom: 8px;
  margin-top: 8px;
}
</style>
