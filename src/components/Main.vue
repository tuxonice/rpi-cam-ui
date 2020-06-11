<template>
  <div>
    <div class="container">
      <demo-mode></demo-mode>
      <server-time></server-time>
      <div class="row">
        <image-preview></image-preview>
        <configuration></configuration>
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
import ImagePreview from "@/components/ImagePreview.vue";
import Configuration from "@/components/Configuration.vue";
import InfoBox from "@/components/InfoBox.vue";

export default {
  name: "Main",
  components: {
    DemoMode,
    ServerTime,
    ImagePreview,
    Configuration,
    InfoBox
  }
};
</script>
