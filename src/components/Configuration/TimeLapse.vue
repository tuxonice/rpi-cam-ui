<template>
  <div role="tabpanel" class="tab-pane mt-3 mb-3" id="timelapse-tab">
    <div class="form-group">
      <label for="timeout">Total Duration (in seconds)</label>
      <input
        type="text"
        class="form-control"
        id="timeout"
        name="timeout"
        v-model.number="configuration.timeout"
        value=""
      />
    </div>

    <div class="form-group">
      <label for="timelapse">Image step (in seconds)</label>
      <input
        type="text"
        class="form-control"
        id="timelapse"
        name="timelapse"
        v-model.number="configuration.timelapse"
        value=""
      />
    </div>

    <div class="checkbox">
      <label>
        <input
          name="process-video"
          id="process-video"
          type="checkbox"
          v-model="configuration.processVideo"
          value="1"
        />
        Process Video
      </label>
    </div>

    <div class="form-group">
      <label for="mencoder-vcodec">Codec</label>
      <select
        class="form-control"
        name="mencoder-vcodec"
        id="mencoder-vcodec"
        v-model="configuration.mencoderVcodec"
      >
        <option value="mpeg4">Mpeg 4</option>
      </select>
    </div>

    <div class="form-group">
      <label for="mencoder-aspect">Video Aspect Ratio</label>
      <select
        class="form-control"
        name="mencoder-aspect"
        id="mencoder-aspect"
        v-model="configuration.mencoderAspect"
      >
        <option value="16/9">16/9</option>
        <option value="4/3">4/3</option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  name: "TimeLapse",
  props: {
    configuration: Object
  },
  data: function() {
    return {};
  }
};
</script>
