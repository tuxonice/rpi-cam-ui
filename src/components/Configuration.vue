<template>
  <div class="row">
    <div class="col-md-6">
      <h2>Preview</h2>
      <img
        id="live-image-placeholder"
        src="dist/timelapse-splash.png"
        class="img-responsive"
        alt="Responsive image"
      />
    </div>
    <div class="col-md-6">
      <h2>Configuration</h2>
      <form id="configData">
        <input type="hidden" name="type" id="type" value="preview" />
        <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="#basic" data-toggle="tab"
                >Basic</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#effects" data-toggle="tab">Effects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#transformations" data-toggle="tab"
                >Transformations</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#shell" data-toggle="tab"
                >Shell Script</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#timelapse-tab" data-toggle="tab"
                >Timelapse</a
              >
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <basic-configuration
              v-bind:configuration.sync="basicConfiguration"
            ></basic-configuration>
            <effects-configuration
              v-bind:configuration.sync="effectsConfiguration"
            ></effects-configuration>
            <transformations-configuration
              v-bind:configuration.sync="transformationsConfiguration"
            ></transformations-configuration>
            <time-lapse-configuration
              v-bind:configuration.sync="timeLapseConfiguration"
            ></time-lapse-configuration>
            <shell-script-configuration
              v-bind:ShellScript="shellScript"
            ></shell-script-configuration>
          </div>
        </div>
      </form>
    </div>

    <div class="mt-2 ml-3">
      <button
        type="button"
        @click.prevent="preview"
        class="btn btn-primary btn-lg "
        id="live-image"
      >
        Preview Image
      </button>
    </div>
  </div>
</template>

<script>
import BasicConfiguration from "@/components/Configuration/Basic.vue";
import EffectsConfiguration from "@/components/Configuration/Effects.vue";
import TransformationsConfiguration from "@/components/Configuration/Transformations.vue";
import TimeLapseConfiguration from "@/components/Configuration/TimeLapse.vue";
import ShellScriptConfiguration from "@/components/Configuration/ShellScript.vue";
import axios from "axios";

export default {
  name: "Configuration",
  components: {
    BasicConfiguration,
    EffectsConfiguration,
    TransformationsConfiguration,
    TimeLapseConfiguration,
    ShellScriptConfiguration
  },
  mounted() {},
  methods: {
    preview: function() {
      axios
        .post("http://127.0.0.1:8000/ajax.php", {
          basicConfiguration: this.basicConfiguration,
          effectsConfiguration: this.effectsConfiguration,
          transformationsConfiguration: this.transformationsConfiguration,
          timeLapseConfiguration: this.timeLapseConfiguration
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  data: function() {
    return {
      basicConfiguration: {
        width: 1200,
        height: 200,
        rotation: 0,
        vflip: false,
        hflip: false
      },
      effectsConfiguration: {
        exposure: "",
        awb: "",
        imxfx: ""
      },
      transformationsConfiguration: {
        sharpness: 0,
        contrast: 0,
        brightness: 50,
        saturation: 0,
        ISO: 100,
        ev: 0
      },
      timeLapseConfiguration: {
        timeout: null,
        timelapse: null,
        processVideo: false,
        mencoderVcodec: null,
        mencoderAspect: null
      },
      shellScript: ""
    };
  }
};
</script>
