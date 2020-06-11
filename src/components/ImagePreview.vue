<template>
  <div class="col-md-6">
    <h2>Preview</h2>
    <img
      id="live-image-placeholder"
      src="dist/timelapse-splash.png"
      class="img-responsive"
      alt="Responsive image"
    />
    <div class="mt-2">
      <button
        type="button"
        @click="preview"
        class="btn btn-primary btn-lg "
        id="live-image"
      >
        Preview Image
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "ImagePreview",
  methods: {
    preview() {
      console.log("preview clicked");
    }
  }
};
</script>
