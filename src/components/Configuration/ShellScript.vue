<template>
  <div role="tabpanel" class="tab-pane mt-3 mb-3" id="shell">
    <div class="form-group">
      <textarea
        class="form-control"
        id="shellScript"
        rows="8"
        v-model="shellScript"
        readonly="readonly"
      ></textarea>
    </div>
  </div>
</template>

<script>
export default {
  name: "ShellScript",
  data: function() {
    return {};
  },
  computed: {
    shellScript() {
      return this.$store.state.shellContent;
    }
  }
};
</script>
