<template>
  <div class="row">
    <div class="col-md-12">
      <div
        id="info-box"
        class="alert alert-success"
        role="alert"
        style="margin-top:20px"
      >
        This is a nice info text {{ width }} - {{ imageSize }}
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "InfoBox",
  computed: {
    imageSize() {
      return this.$store.getters.imageSize;
    },
    ...mapState(["basicConfiguration", "status"]),
    width() {
      return `${this.basicConfiguration.imageWidth} / ${this.basicConfiguration.imageHeight} / ${this.status.time}
    `;
    }
  }
};
</script>
