<template>
  <div role="tabpanel" class="tab-pane mt-3 mb-3" id="timelapse-tab">
    <div class="form-group">
      <label for="timeout">Total Duration (in seconds)</label>
      <input
        type="text"
        class="form-control"
        id="timeout"
        name="timeout"
        @input="updateTimeout()"
        v-model.number="timeout"
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
        @input="updateTimelapse()"
        v-model.number="timelapse"
        value=""
      />
    </div>

    <div class="checkbox">
      <label>
        <input
          name="process-video"
          id="process-video"
          type="checkbox"
          @change="updateProcessVideo()"
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
        @change="updateMencoderVcodec()"
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
        @change="updateMencoderAspect()"
        v-model="mencoderAspect"
      >
        <option value="16/9">16/9</option>
        <option value="4/3">4/3</option>
      </select>
    </div>
    <time-lapse-button></time-lapse-button>
  </div>
</template>

<script>
import TimeLapseButton from "@/components/Configuration/TimeLapseButton.vue";

export default {
  name: "TimeLapse",
  components: {
    TimeLapseButton
  },
  props: {},
  data: function() {
    return {
      timeout: null,
      timelapse: null,
      processVideo: false,
      mencoderVcodec: null,
      mencoderAspect: null
    };
  },
  methods: {
    updateTimeout() {
      this.$store.commit("setTimeLapseConfigurationTimeout", this.timeout);
    },
    updateTimelapse() {
      this.$store.commit("setTimeLapseConfigurationTimelapse", this.timelapse);
    },
    updateProcessVideo() {
      this.$store.commit(
        "setTimeLapseConfigurationProcessVideo",
        this.processVideo
      );
    },
    updateMencoderVcodec() {
      this.$store.commit(
        "setTimeLapseConfigurationMencoderVcodec",
        this.mencoderVcodec
      );
    },
    updateMencoderAspect() {
      this.$store.commit(
        "setTimeLapseConfigurationMencoderAspect",
        this.mencoderAspect
      );
    }
  }
};
</script>
