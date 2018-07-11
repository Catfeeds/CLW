<template>
  <el-autocomplete 
  name='keyword'
  placement="bottom-end"
  :placeholder='placeholder'
  :fetch-suggestions="querySearchAsync"
  :trigger-on-focus="false">
  </el-autocomplete>
</template>
<script>
import { Autocomplete } from 'element-ui'
const ElAutocomplete = Autocomplete
import { getSelectInfo } from '../../../home_api'
export default {
  props: ['placeholder'],
  components: { ElAutocomplete },
  methods: {
    querySearchAsync(queryString, cb) {
      getSelectInfo({ selectInfo: queryString }).then(res => {
        console.log(res)
      })
    }
  }
}
</script>

