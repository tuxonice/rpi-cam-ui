<template>
  <div>
    <div class="container">
      <demo-mode></demo-mode>
      <server-time></server-time>
      <div class="row">
        <preview></preview>
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
import Configuration from "@/components/Configuration.vue";
import InfoBox from "@/components/InfoBox.vue";
import Preview from "@/components/Preview.vue";
import axios from "axios";

export default {
  name: "Main",
  components: {
    DemoMode,
    ServerTime,
    Configuration,
    InfoBox,
    Preview
  },
  data() {
    return {
      polling: null
    };
  },
  methods: {
    pollData() {
      this.polling = setInterval(() => {
        console.log(Date.now());
        this.heartbeat();
      }, 10000);
    },
    heartbeat: async function() {
      const status = await axios.post("http://127.0.0.1:8000/heartbeat.php");
      this.$store.commit("setTime", status.data);
      console.log(status.data);
    }
  },
  beforeDestroy() {
    clearInterval(this.polling);
  },
  created() {
    // this.pollData();
  }
};
</script>
