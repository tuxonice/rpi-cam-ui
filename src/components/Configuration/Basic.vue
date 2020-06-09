<template>
  <div
    role="tabpanel"
    class="tab-pane active"
    id="basic"
    style="margin-top:20px; margin-bottom:20px;"
  >
    <div class="form-group">
      <label for="width">Image Width</label>
      <input
        type="text"
        class="form-control"
        id="width"
        name="width"
        v-model="width"
        aria-describedby="widthHelp"
      />
      <small id="widthHelp" class="form-text text-muted">Image width</small>
    </div>
    <div class="form-group">
      <label for="height">Image Height</label>
      <input
        type="text"
        class="form-control"
        id="height"
        name="height"
        v-model="height"
        aria-describedby="heightHelp"
      />
      <small id="heightHelp" class="form-text text-muted">Image height</small>
    </div>
    <div class="form-group">
      <label for="rotation">Image Rotation</label>
      <select
        class="form-control"
        id="rotation"
        name="rotation"
        v-model="rotation"
      >
        <option value="">No rotation</option>
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
          value="1"
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
          value="1"
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
  data: function() {
    return {
      width: null,
      height: null,
      rotation: 0,
      hflip: false,
      vflip: false
    };
  }
};
</script>
