<template>
  <div class="col-md-6">
    <h2>Configuration</h2>
    <form id="configData">
      <input type="hidden" name="type" id="type" value="preview" />
      <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#basic" data-toggle="tab">Basic</a>
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
            <a class="nav-link" href="#shell" data-toggle="tab">Shell Script</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#timelapse-tab" data-toggle="tab"
              >Timelapse</a
            >
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <basic-configuration></basic-configuration>
          <effects-configuration></effects-configuration>
          <transformations-configuration></transformations-configuration>
          <time-lapse-configuration></time-lapse-configuration>
          <shell-script-configuration></shell-script-configuration>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import BasicConfiguration from "@/components/Configuration/Basic.vue";
import EffectsConfiguration from "@/components/Configuration/Effects.vue";
import TransformationsConfiguration from "@/components/Configuration/Transformations.vue";
import TimeLapseConfiguration from "@/components/Configuration/TimeLapse.vue";
import ShellScriptConfiguration from "@/components/Configuration/ShellScript.vue";

export default {
  name: "Configuration",
  components: {
    BasicConfiguration,
    EffectsConfiguration,
    TransformationsConfiguration,
    TimeLapseConfiguration,
    ShellScriptConfiguration
  }
};
</script>
