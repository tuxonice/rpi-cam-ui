<template>
  <div role="tabpanel" class="tab-pane mt-3 mb-3 active" id="basic">
    <div class="form-group">
      <label for="imageWidth">Image Width</label>
      <input
        type="text"
        class="form-control"
        id="imageWidth"
        name="imageWidth"
        v-model.number="imageWidth"
        @input="updateImageWidth()"
        aria-describedby="imageWidthHelp"
      />
      <small id="imageWidthHelp" class="form-text text-muted">
        Image width
      </small>
    </div>
    <div class="form-group">
      <label for="imageHeight">Image Height</label>
      <input
        type="text"
        class="form-control"
        id="imageHeight"
        name="imageHeight"
        @input="updateImageHeight()"
        v-model.number="imageHeight"
        aria-describedby="imageHeightHelp"
      />
      <small id="imageHeightHelp" class="form-text text-muted"
        >Image height</small
      >
    </div>
    <div class="form-group">
      <label for="imageRotation">Image Rotation</label>
      <select
        class="form-control"
        id="imageRotation"
        name="imageRotation"
        @change="updateImageRotation()"
        v-model.number="imageRotation"
      >
        <option value="0">No rotation</option>
        <option value="90">90 Degrees</option>
        <option value="180">180 Degrees</option>
        <option value="270">270 Degrees</option>
      </select>
    </div>
    <div class="checkbox">
      <label>
        <input
          name="hflip"
          id="hflip"
          type="checkbox"
          @change="updateHflip()"
          v-model="hflip"
        />
        Horizontal flip
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input
          name="vflip"
          id="vflip"
          type="checkbox"
          @change="updateVflip()"
          v-model="vflip"
        />
        Vertical flip
      </label>
    </div>
  </div>
</template>

<script>
export default {
  name: "BasicConfiguration",
  props: {},
  data: function() {
    return {
      imageWidth: 1200,
      imageHeight: 1200,
      imageRotation: 0,
      hflip: false,
      vflip: false
    };
  },
  methods: {
    updateImageWidth() {
      this.$store.commit("setBasicConfigurationImageWidth", this.imageWidth);
    },
    updateImageHeight() {
      this.$store.commit("setBasicConfigurationImageHeight", this.imageHeight);
    },
    updateImageRotation() {
      this.$store.commit(
        "setBasicConfigurationImageRotation",
        this.imageRotation
      );
    },
    updateVflip() {
      this.$store.commit("setBasicConfigurationVflip", this.vflip);
    },
    updateHflip() {
      this.$store.commit("setBasicConfigurationHflip", this.hflip);
    }
  },
  mounted() {
    this.$store.commit("setBasicConfigurationImageWidth", this.imageWidth);
    this.$store.commit("setBasicConfigurationImageHeight", this.imageHeight);
    this.$store.commit(
      "setBasicConfigurationImageRotation",
      this.imageRotation
    );
    this.$store.commit("setBasicConfigurationVflip", this.vflip);
    this.$store.commit("setBasicConfigurationHflip", this.hflip);
  }
};
</script>
