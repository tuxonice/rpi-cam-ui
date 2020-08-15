<template>
  <div>
    <div class="container">
      <demo-mode></demo-mode>
      <server-time></server-time>
      <div class="row">
        <preview></preview>
        <configuration></configuration>
        <preview-button></preview-button>
      </div>
      <info-box></info-box>
      <hr />
      <footer>
        <p></p>
      </footer>
    </div>
    <!-- /container -->
  </div>
</template>

<script>
import DemoMode from "@/components/DemoMode.vue";
import ServerTime from "@/components/ServerTime.vue";
import Configuration from "@/components/Configuration.vue";
import InfoBox from "@/components/InfoBox.vue";
import Preview from "@/components/Preview.vue";
import PreviewButton from "@/components/PreviewButton.vue";

export default {
  name: "Main",
  components: {
    DemoMode,
    ServerTime,
    Configuration,
    InfoBox,
    Preview,
    PreviewButton
  }
};
</script>
