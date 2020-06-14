<template>
  <div>
    <div class="container">
      <demo-mode></demo-mode>
      <server-time></server-time>
      <configuration></configuration>
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

export default {
  name: "Main",
  components: {
    DemoMode,
    ServerTime,
    Configuration,
    InfoBox
  }
};
</script>
