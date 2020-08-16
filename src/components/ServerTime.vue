<template>
  <div class="row">
    <div class="col-md-6">
      <div>
        <b>Raspberry Time:</b> <span id="serverTime">{{ status.time }}</span>
      </div>
    </div>
    <div class="col-md-6">
      <div>
        <b>Browser Time:</b>
        <span id="browserTime">{{ formatedBrowserTime }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import { DateTime } from "luxon";
import { mapState } from "vuex";

export default {
  name: "ServerTime",
  data() {
    return {
      browserTime: DateTime.local(),
      raspberryTime: null
    };
  },
  computed: {
    formatedBrowserTime() {
      return this.browserTime.toFormat("HH:mm:ss");
    },
    ...mapState(["status"])
  },
  created() {
    setInterval(() => (this.browserTime = DateTime.local()), 1000);
  }
};
</script>
