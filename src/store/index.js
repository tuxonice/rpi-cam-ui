import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    status: {
      time: null
    },
    basicConfiguration: {
      imageWidth: null,
      imageHeight: null,
      imageRotation: 0,
      hflip: false,
      vflip: false
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
      iso: 100,
      ev: 0
    },
    timeLapseConfiguration: {
      timeout: null,
      timelapse: null,
      processVideo: false,
      mencoderVcodec: null,
      mencoderAspect: null
    },
    shellContent: '',
    previewImage: 'dist/timelapse-splash.png'
  },
  mutations: {
    setTime(state, status) {
      state.status = status;
    },
    setShellContent(state, content) {
      state.shellContent = content;
    },
    setBasicConfigurationImageWidth(state, imageWidth) {
      state.basicConfiguration.imageWidth = imageWidth;
    },
    setBasicConfigurationImageHeight(state, imageHeight) {
      state.basicConfiguration.imageHeight = imageHeight;
    },
    setBasicConfigurationImageRotation(state, imageRotation) {
      state.basicConfiguration.imageRotation = imageRotation;
    },
    setBasicConfigurationVflip(state, vflip) {
      state.basicConfiguration.vflip = vflip;
    },
    setBasicConfigurationHflip(state, hflip) {
      state.basicConfiguration.hflip = hflip;
    },
    setEffectsConfigurationExposure(state, exposure) {
      state.effectsConfiguration.exposure = exposure;
    },
    setEffectsConfigurationAwb(state, awb) {
      state.effectsConfiguration.awb = awb;
    },
    setEffectsConfigurationImxfx(state, imxfx) {
      state.effectsConfiguration.imxfx = imxfx;
    },
    setTransformationsConfigurationSharpness(state, sharpness) {
      state.transformationsConfiguration.sharpness = sharpness;
    },
    setTransformationsConfigurationContrast(state, contrast) {
      state.transformationsConfiguration.contrast = contrast;
    },
    setTransformationsConfigurationBrightness(state, brightness) {
      state.transformationsConfiguration.brightness = brightness;
    },
    setTransformationsConfigurationSaturation(state, saturation) {
      state.transformationsConfiguration.saturation = saturation;
    },
    setTransformationsConfigurationIso(state, iso) {
      state.transformationsConfiguration.iso = iso;
    },
    setTransformationsConfigurationEv(state, ev) {
      state.transformationsConfiguration.ev = ev;
    },
    setTimeLapseConfigurationTimeout(state, timeout) {
      state.timeLapseConfiguration.timeout = timeout;
    },
    setTimeLapseConfigurationTimelapse(state, timelapse) {
      state.timeLapseConfiguration.timelapse = timelapse;
    },
    setTimeLapseConfigurationProcessVideo(state, processVideo) {
      state.timeLapseConfiguration.processVideo = processVideo;
    },
    setTimeLapseConfigurationMencoderVcodec(state, mencoderVcoder) {
      state.timeLapseConfiguration.mencoderVcodec = mencoderVcoder;
    },
    setTimeLapseConfigurationMencoderAspect(state, mencoderAspect) {
      state.timeLapseConfiguration.mencoderAspect = mencoderAspect;
    }
  },
  actions: {},
  getters: {
    imageSize: state => {
      return (
        state.basicConfiguration.imageWidth *
        state.basicConfiguration.imageHeight
      );
    }
  },
  modules: {}
});
