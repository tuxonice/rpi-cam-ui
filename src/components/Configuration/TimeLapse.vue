<template>
  <div
    role="tabpanel"
    class="tab-pane"
    id="timelapse-tab"
    style="margin-top:20px; margin-bottom:20px;"
  >
    <div class="form-group">
      <label for="timeout">Total Duration (in seconds)</label>
      <input
        type="text"
        class="form-control"
        id="timeout"
        name="timeout"
        v-model="timeout"
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
        v-model="timelapse"
        value=""
      />
    </div>

    <div class="checkbox">
      <label>
        <input
          name="process-video"
          id="process-video"
          type="checkbox"
          v-model="processVideo"
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
        v-model="mencoderVcodec"
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
        v-model="mencoderAspect"
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
  data: function() {
    return {
      timeout: null,
      timelapse: null,
      processVideo: false,
      mencoderVcodec: null,
      mencoderAspect: null
    };
  }
};
</script>
