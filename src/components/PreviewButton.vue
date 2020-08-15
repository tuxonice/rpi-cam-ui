<template>
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
</template>

<script>
import axios from "axios";

export default {
  name: "PreviewButton",
  methods: {
    preview: function() {
      console.log('click');
      axios
        .post("http://127.0.0.1:8000/ajax.php", {
          basicConfiguration: '',
          effectsConfiguration: '',
          transformationsConfiguration: '',
          timeLapseConfiguration: ''
        })
        .then(function(response) {
          console.log(response.data);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
};
</script>