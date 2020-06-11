<template>
  <div role="tabpanel" class="tab-pane mt-3 mb-3" id="transformations">
    <div class="form-group">
      <label for="sharpness">Image sharpness</label>
      <span class="current-value"> {{ configuration.sharpness }} </span>
      <input
        type="range"
        min="-100"
        max="100"
        class="form-control-range"
        name="sharpness"
        id="sharpness"
        v-model.number="configuration.sharpness"
        value="0"
      />
      <small class="form-text text-muted">
        Sets the sharpness of the image (-100 - 100). 0 is the default.
      </small>
    </div>

    <div class="form-group">
      <label for="contrast">Image contrast</label>
      <span class="current-value"> {{ configuration.contrast }} </span>
      <input
        type="range"
        min="-100"
        max="100"
        class="form-control-range"
        name="contrast"
        id="contrast"
        v-model.number="configuration.contrast"
        value="0"
      />
      <small class="form-text text-muted">
        Sets the contrast of the image (-100 - 100). 0 is the default.
      </small>
    </div>

    <div class="form-group">
      <label for="brightness">Image brightness </label>
      <span class="current-value"> {{ configuration.brightness }} </span>
      <input
        type="range"
        min="0"
        max="100"
        class="form-control-range"
        name="brightness"
        id="brightness"
        v-model.number="configuration.brightness"
        value="50"
      />
      <small class="form-text text-muted">
        Sets the brightness of the image. 50 is the default. 0 is black, 100 is
        white.
      </small>
    </div>

    <div class="form-group">
      <label for="saturation">Image saturation</label>
      <span class="current-value"> {{ configuration.saturation }} </span>
      <input
        type="range"
        min="-100"
        max="100"
        class="form-control-range"
        name="saturation"
        id="saturation"
        v-model.number="configuration.saturation"
        value="0"
      />
      <small class="form-text text-muted">
        Sets the colour saturation of the image (-100 - 100). 0 is the default.
      </small>
    </div>

    <div class="form-group">
      <label for="ISO">Capture ISO</label>
      <span class="current-value"> {{ configuration.ISO }} </span>
      <input
        type="range"
        min="100"
        max="800"
        class="form-control-range"
        name="ISO"
        id="ISO"
        value="100"
        v-model.number="configuration.ISO"
        step="10"
      />
      <small class="form-text text-muted">
        Sets the ISO to be used for captures (100 - 800).
      </small>
    </div>

    <div class="form-group">
      <label for="ev">EV compensation</label>
      <span class="current-value"> {{ configuration.ev }} </span>
      <input
        type="range"
        min="-10"
        max="10"
        class="form-control-range"
        name="ev"
        id="ev"
        v-model.number="configuration.ev"
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
  props: {
    configuration: Object
  },
  data: function() {
    return {};
  }
};
</script>
<style scoped>
span.current-value {
  color: blue;
  font-weight: 800;
}
</style>
