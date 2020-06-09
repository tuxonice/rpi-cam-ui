<template>
  <div
    role="tabpanel"
    class="tab-pane"
    id="shell"
    style="margin-top:20px; margin-bottom:20px;"
  >
    <div class="form-group">
      <textarea
        class="form-control"
        id="shellScript"
        rows="8"
        readonly="readonly"
      ></textarea>
    </div>
  </div>
</template>

<script>
export default {
  name: "ShellScript"
};
</script>
