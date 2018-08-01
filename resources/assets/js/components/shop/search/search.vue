<template>
  <el-autocomplete 
  name='keyword'
  v-model="keyword"
  placement="bottom-end"
  :hide-loading='true'
  :placeholder='placeholder'
  :fetch-suggestions="querySearchAsync"
  :trigger-on-focus="false"
  @select="handleSelect">
  </el-autocomplete>
</template>
<script>
import { Autocomplete } from 'element-ui'
const ElAutocomplete = Autocomplete
import { getSelectInfo } from '../../../home_api'
export default {
  props: ['placeholder', 'value'],
  data() {
    const keyword = this.value
    return {
      keyword: this.value
    }
  },
  components: { ElAutocomplete },
  methods: {
    querySearchAsync(queryString, cb) {
      cb([])
      getSelectInfo({ selectInfo: queryString }).then(res => {
        cb(res.data)
      })
    },
    handleSelect(item) {
      // window.location.href ='/building_list?keyword=' + item.value
      console.log(item)
    }
  }
}
</script>

