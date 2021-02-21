<template>
  <div class="mt-2">
    <button
      type="button"
      @click.prevent="preview"
      class="btn btn-primary btn-lg"
      :disabled="isPreviewDisabled"
    >
      Preview Image
    </button>
  </div>
</template>

<script>
import axios from "axios";
import { mapState } from "vuex";

export default {
  name: "PreviewButton",
  computed: {
    ...mapState([
      "basicConfiguration",
      "effectsConfiguration",
      "transformationsConfiguration"
    ])
  },
  data() {
    return {
      isPreviewDisabled: false
    };
  },
  methods: {
    preview: async function() {
      this.isPreviewDisabled = true;
      const shellContent = await axios.post(
        "preview.php",
        {
          basicConfiguration: this.basicConfiguration,
          effectsConfiguration: this.effectsConfiguration,
          transformationsConfiguration: this.transformationsConfiguration
        }
      );
      this.$store.commit("setShellContent", shellContent.data);
      setTimeout(() => {
        this.isPreviewDisabled = false;
        this.$store.state.previewImage =
          "http://lorempixel.com/550/450/?" + Date.now();
      }, 2000);
    }
  }
};
</script>
