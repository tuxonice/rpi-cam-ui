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
        value=""
      />
    </div>

    <div class="checkbox">
      <label>
        <input
          name="process-video"
          id="process-video"
          type="checkbox"
          value="1"
        />
        Process Video
      </label>
    </div>

    <div class="form-group">
      <label for="mencoder-vcodec">Codec</label>
      <select class="form-control" name="mencoder-vcodec" id="mencoder-vcodec">
        <option value="mpeg4">Mpeg 4</option>
      </select>
      <p class="help-block">Set Codec</p>
    </div>

    <div class="form-group">
      <label for="mencoder-aspect">Video Aspect Ratio</label>
      <select class="form-control" name="mencoder-aspect" id="mencoder-vcodec">
        <option value="16/9">16/9</option>
        <option value="4/3">4/3</option>
      </select>
      <p class="help-block">Video Aspect Ratio</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "TimeLapse"
};
</script>
