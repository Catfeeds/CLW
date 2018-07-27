<template>
  <el-autocomplete
    v-model="keyword"
    :fetch-suggestions="querySearch"
    :trigger-on-focus="false"
    @select="handleSelect"
  ></el-autocomplete>
</template>
<script>
import { Autocomplete } from 'element-ui'
const ElAutocomplete = Autocomplete
export default {
  data() {
    return {
      keyword: []
    }
  },
  components: { ElAutocomplete }
}
</script>

