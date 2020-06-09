<template>
  <div
    role="tabpanel"
    class="tab-pane"
    id="effects"
    style="margin-top:20px; margin-bottom:20px;"
  >
    <div class="form-group">
      <label for="exposure">Exposure mode</label>
      <select
        class="form-control"
        id="exposure"
        name="exposure"
        v-model="exposure"
        aria-describedby="exposureHelp"
      >
        <option value="">Use automatic exposure mode (default)</option>
        <option value="night">Select setting for night shooting</option>
        <option value="nightpreview">nightpreview</option>
        <option value="backlight"> Select setting for backlit subject</option>
        <option value="spotlight">Spotlight</option>
        <option value="sports">
          Select setting for sports (fast shutter etc.)</option
        >
        <option value="snow">
          Select setting optimised for snowy scenery</option
        >
        <option value="beach"> Select setting optimised for beach</option>
        <option value="verylong"> Select setting for long exposures</option>
        <option value="fixedfps"> Constrain fps to a fixed value</option>
        <option value="antishake"> Antishake mode</option>
        <option value="fireworks">
          Select setting optimised for fireworks</option
        >
      </select>
      <small id="exposureHelp" class="form-text text-muted">
        Set exposure mode (not all of these settings may be implemented,
        depending on camera tuning)
      </small>
    </div>
    <div class="form-group">
      <label for="awb">Automatic White Balance (AWB) mode</label>
      <select
        class="form-control"
        name="awb"
        id="awb"
        v-model="awb"
        aria-describedby="awbHelp"
      >
        <option value="">Automatic mode (default)</option>
        <option value="off">Turn off white balance calculation</option>
        <option value="sun">Sunny mode (between 5000K and 6500K)</option>
        <option value="cloud">Cloudy mode (between 6500K and 12000K)</option>
        <option value="shade">Shade mode</option>
        <option value="tungsten"
          >Tungsten lighting mode (between 2500K and 3500K)</option
        >
        <option value="fluorescent"
          >Fluorescent lighting mode (between 2500K and 4500K)</option
        >
        <option value="incandescent">Incandescent lighting mode</option>
        <option value="flash">Flash mode</option>
        <option value="horizon">Horizon mode</option>
      </select>
      <small id="awbHelp" class="form-text text-muted">
        Modes for which colour temperature ranges (K) are available have these
        settings in brackets
      </small>
    </div>
    <div class="form-group">
      <label for="imxfx">Image effect</label>
      <select class="form-control" name="imxfx" id="imxfx" v-model="imxfx">
        <option value="">No effect (default)</option>
        <option value="negative">Invert the image colours</option>
        <option value="solarise">Solarise the image</option>
        <option value="posterise">Posterise the image</option>
        <option value="whiteboard">Whiteboard effect</option>
        <option value="blackboard">Blackboard effect</option>
        <option value="sketch">Sketch effect</option>
        <option value="denoise">Denoise the image</option>
        <option value="emboss">Emboss the image</option>
        <option value="oilpaint">Oil paint effect</option>
        <option value="hatch">Hatch sketch effect</option>
        <option value="gpen">Graphite sketch effect</option>
        <option value="pastel">Pastel effect</option>
        <option value="watercolour">Watercolour effect</option>
        <option value="film">Film grain effect</option>
        <option value="blur">Blur the image</option>
        <option value="saturation">Colour saturate the image</option>
        <option value="colourswap">Colourswap (not fully implemented)</option>
        <option value="washedout">Washedout (not fully implemented)</option>
        <option value="colourpoint">Colourpoint (not fully implemented)</option>
        <option value="colourbalance"
          >colourbalance (not fully implemented)</option
        >
        <option value="cartoon">Cartoon (not fully implemented)</option>
      </select>
      <small class="form-text text-muted"
        >Set an effect to be applied to the image</small
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "Effects",
  data: function() {
    return {
      exposure: "",
      awb: "",
      imxfx: ""
    };
  }
};
</script>
