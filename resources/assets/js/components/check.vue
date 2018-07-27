<template>
  <div class="wrap">
    <div class="title">楚楼网发布会嘉宾签到系统</div>
  </div>
</template>

<script>
import { Table, TableColumn, Select, Input, Col, Row, Button } from 'element-ui';
var ElTable = Table,
    ElTableColumn = TableColumn,
    ElSelect = Select,
    ElCol = Col,
    ElRow = Row,
    ElInput = Input
    ElButton = Button
export default {
  components: {
    ElTable,
    ElTableColumn,
    ElSelect,
    ElInput,
    ElRow,
    ElCol,
    ElButton
  },
  data() {
    return {

    }
  }
}
</script>

<style lang="scss" scoped>
  .wrap {
    width: 1200px;
    margin: 0 auto;
    margin-top:50px;
    .title {
      font-size: 22px;
      text-align: center;
    }
  }
</style>

