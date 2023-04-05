<template>
  <v-pagination
    v-if="links.length > 3"
    v-model="page"
    :length="links.length - 2"
    @input="$emit('input-page', $event)"
  ></v-pagination>
</template>
<script>
export default {
  props: ["links"],
  data() {
    return {
      page: 1,
    };
  },
};
</script>
