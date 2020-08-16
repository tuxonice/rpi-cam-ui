<template>
  <div class="mt-2">
    <button
      type="button"
      @click.prevent="preview"
      class="btn btn-primary btn-lg "
      id="live-image"
    >
      Run Timelapse
    </button>
  </div>
</template>

<script>
import axios from "axios";
import { mapState } from "vuex";

export default {
  name: "TimeLapseButton",
  computed: {
    ...mapState([
      "basicConfiguration",
      "effectsConfiguration",
      "transformationsConfiguration",
      "timeLapseConfiguration"
    ])
  },
  methods: {
    preview: async function() {
      await axios.post("http://127.0.0.1:8000/timelapse.php", {
        basicConfiguration: this.basicConfiguration,
        effectsConfiguration: this.effectsConfiguration,
        transformationsConfiguration: this.transformationsConfiguration,
        timeLapseConfiguration: this.timeLapseConfiguration
      });
    }
  }
};
</script>
