<template>
  <bm-overlay
    ref="customOverlay"
    class="sample"
    pane="labelPane"
    @draw="draw">
    <slot></slot>
  </bm-overlay>
</template>

<script>
import { BmOverlay } from 'vue-baidu-map'
export default {
  props: ['position'],
  components: {
    BmOverlay
  },
  watch: {
    position: {
      handler () {
        this.$refs.customOverlay.reload()
      },
      deep: true
    }
  },
  methods: {
    handleClick () {
      global.alert('Well done.')
    },
    draw ({el, BMap, map}) {
      const {lng, lat} = this.position
      const pixel = map.pointToOverlayPixel(new BMap.Point(lng, lat))
      el.style.left = pixel.x+'px'
      el.style.top = pixel.y+'px'
    }
  }
}
</script>
<style lang="scss" scoped>
.sample{
  position: absolute;
}
</style>
