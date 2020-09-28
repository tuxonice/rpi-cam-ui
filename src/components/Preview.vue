<template>
  <div class="col-md-6">
    <h2>Preview</h2>
    <img
      :src="previewImage"
      class="img-responsive"
      alt="Responsive image"
    />
    <preview-button></preview-button>
  </div>
</template>

<script>
import PreviewButton from "@/components/PreviewButton.vue";
export default {
  name: "Preview",
  components: {
    PreviewButton
  },
  computed: {
    previewImage() {
      return this.$store.state.previewImage;
    }
  }
};
</script>
