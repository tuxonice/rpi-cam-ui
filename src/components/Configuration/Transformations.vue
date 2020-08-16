<template>
  <div role="tabpanel" class="tab-pane mt-3 mb-3" id="transformations">
    <div class="form-group">
      <label for="sharpness">Image sharpness</label>
      <span class="current-value"> {{ sharpness }} </span>
      <input
        type="range"
        min="-100"
        max="100"
        class="form-control-range"
        name="sharpness"
        id="sharpness"
        @change="updateSharpness()"
        v-model.number="sharpness"
        value="0"
      />
      <small class="form-text text-muted">
        Sets the sharpness of the image (-100 - 100). 0 is the default.
      </small>
    </div>

    <div class="form-group">
      <label for="contrast">Image contrast</label>
      <span class="current-value"> {{ contrast }} </span>
      <input
        type="range"
        min="-100"
        max="100"
        class="form-control-range"
        name="contrast"
        id="contrast"
        @change="updateContrast()"
        v-model.number="contrast"
        value="0"
      />
      <small class="form-text text-muted">
        Sets the contrast of the image (-100 - 100). 0 is the default.
      </small>
    </div>

    <div class="form-group">
      <label for="brightness">Image brightness </label>
      <span class="current-value"> {{ brightness }} </span>
      <input
        type="range"
        min="0"
        max="100"
        class="form-control-range"
        name="brightness"
        id="brightness"
        @change="updateBrightness()"
        v-model.number="brightness"
        value="50"
      />
      <small class="form-text text-muted">
        Sets the brightness of the image. 50 is the default. 0 is black, 100 is
        white.
      </small>
    </div>

    <div class="form-group">
      <label for="saturation">Image saturation</label>
      <span class="current-value"> {{ saturation }} </span>
      <input
        type="range"
        min="-100"
        max="100"
        class="form-control-range"
        name="saturation"
        id="saturation"
        @change="updateSaturation()"
        v-model.number="saturation"
        value="0"
      />
      <small class="form-text text-muted">
        Sets the colour saturation of the image (-100 - 100). 0 is the default.
      </small>
    </div>

    <div class="form-group">
      <label for="iso">Capture ISO</label>
      <span class="current-value"> {{ iso }} </span>
      <input
        type="range"
        min="100"
        max="800"
        class="form-control-range"
        name="iso"
        id="iso"
        value="100"
        @change="updateIso()"
        v-model.number="iso"
        step="10"
      />
      <small class="form-text text-muted">
        Sets the ISO to be used for captures (100 - 800).
      </small>
    </div>

    <div class="form-group">
      <label for="ev">EV compensation</label>
      <span class="current-value"> {{ ev }} </span>
      <input
        type="range"
        min="-10"
        max="10"
        class="form-control-range"
        name="ev"
        id="ev"
        @change="updateEv()"
        v-model.number="ev"
        value="0"
      />
      <small class="form-text text-muted">
        Set EV compensation (-10 - 10). Default is 0.
      </small>
    </div>
  </div>
</template>

<script>
export default {
  name: "Transformations",
  props: {},
  data: function() {
    return {
      sharpness: 0,
      contrast: 0,
      brightness: 50,
      saturation: 0,
      iso: 100,
      ev: 0
    };
  },
  methods: {
    updateSharpness() {
      this.$store.commit(
        "setTransformationsConfigurationSharpness",
        this.sharpness
      );
    },
    updateContrast() {
      this.$store.commit(
        "setTransformationsConfigurationContrast",
        this.contrast
      );
    },
    updateBrightness() {
      this.$store.commit(
        "setTransformationsConfigurationBrightness",
        this.brightness
      );
    },
    updateSaturation() {
      this.$store.commit(
        "setTransformationsConfigurationSaturation",
        this.saturation
      );
    },
    updateIso() {
      this.$store.commit("setTransformationsConfigurationIso", this.iso);
    },
    updateEv() {
      this.$store.commit("setTransformationsConfigurationEv", this.ev);
    }
  }
};
</script>
<style scoped>
span.current-value {
  color: blue;
  font-weight: 800;
}
</style>
