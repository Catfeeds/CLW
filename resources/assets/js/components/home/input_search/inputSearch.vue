<template>
  <el-autocomplete 
  name='keyword'
  v-model="keyword"
  placement="bottom-end"
  :hide-loading='true'
  :placeholder='placeholder'
  :fetch-suggestions="querySearchAsync"
  :trigger-on-focus="false"
  @select="handleSelect" ref="inputSearch">
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
      keyword: this.value,
      py: null
    }
  },
  components: { ElAutocomplete },
  watch: {
    py(val) {
      this.$refs.inputSearch.debouncedGetData(this.keyword)
    }
  },
  methods: {
    querySearchAsync(queryString, cb) {
      cb([])
      getSelectInfo({ selectInfo: queryString, pySelectInfo: this.py }).then(res => {
        cb(res.data)
      })
    },
    handleSelect(item) {
      window.location.href ='/building_list?keyword=' + item.value
    }
  },
  created() {
    const This = this
    $(document).on('compositionupdate', 'input[name="keyword"]', function(e) {
      This.py = e.originalEvent.data
    })
  }
}
</script>
<style lang="scss">
.el-scrollbar{
  padding-bottom: 15px;
  border-radius: 4px;
  background-color: #fff;
  border: 1px solid #e4e7ed;
  >div{
    border: none;
  }
}
</style>

