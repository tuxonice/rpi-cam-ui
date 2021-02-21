<template>
  <div class="mt-2">
    <button
      type="button"
      @click.prevent="preview"
      class="btn btn-primary btn-lg "
      :disabled="isDisabled"
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
  props: {
    isDisabled: Boolean
  },
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
      const shellContent = await axios.post("timelapse.php", {
        basicConfiguration: this.basicConfiguration,
        effectsConfiguration: this.effectsConfiguration,
        transformationsConfiguration: this.transformationsConfiguration,
        timeLapseConfiguration: this.timeLapseConfiguration
      });
      this.$store.commit("setShellContent", shellContent.data.content);
    }
  }
};
</script>
