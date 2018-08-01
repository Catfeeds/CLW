<template>
  <div class="wrap">
    <div class="title">楚楼网发布会嘉宾签到系统</div>
    <el-row style="margin-bottom:10px" class=".select_area">
      <el-col :span="2" class="special">
        <el-button @click="invite" v-if="screenWidth>960" :class="{current:isInvite}">特邀</el-button>
        <el-button v-else @click="invite" size="mini" :class="{current:isInvite}">特邀</el-button>
      </el-col>
      <el-col :span="2" class="not">
        <el-button @click="not" v-if="screenWidth>960" :class="{current:isArrive}">未到</el-button>
        <el-button v-else @click="not"  size="mini" :class="{current:isArrive}">未到</el-button>
      </el-col>
      <el-col :span="3" class="tel">
        <el-input prefix-icon="el-icon-search" v-if="screenWidth>960" style="min-width:144px;" placeholder="请输入电话号码" v-model="tel" @blur="search"></el-input>
        <el-input prefix-icon="el-icon-search" v-else style="min-width:140px;min-width:144px;line-height:30px;height:30px" placeholder="请输入电话号码" v-model="tel" @blur="search"></el-input>
      </el-col>
    </el-row>
    <el-table
      :data="tableData"
      border
      style="text-align:center;width:100%;color:#909399"
    >
      <el-table-column
        label="姓名"
        align="center"
        prop="name"
      >
        <template slot-scope="scope">
          <span>{{scope.row.name.name}}&nbsp</span>
          <el-tag v-if="scope.row.name.show" size="mini">特</el-tag>
        </template>
      </el-table-column>
      <el-table-column
        prop="phone"
        label="手机"
        align="center"
      ></el-table-column>
      <el-table-column
        prop="work"
        label="单位名称"
        align="center"
        v-if="screenWidth>720"
      ></el-table-column>
      <el-table-column
        prop="num"
        align="center"
        label="嘉宾编号"
        v-if="screenWidth>720"
      ></el-table-column>
      <el-table-column
        label="签到情况"
        align="center"
        prop="arrive"
      >
        <template slot-scope="slot">
          <el-button type="primary" v-if="slot.row.arrive" @click="slot.row.arrive = !slot.row.arrive" size="mini">
            签到
          </el-button>
          <el-tag v-else="slot.row.arrive" class="arrive_tag">
            已签到
          </el-tag>
        </template>
      </el-table-column>
      <el-table-column
        prop="invite"
        align="center"
        label="邀请通知"
        v-if="screenWidth>720"
      ></el-table-column>
      <el-table-column
        prop="sure"
        label="确认通知"
        align="center"
        v-if="screenWidth>720"
      ></el-table-column>
      <el-table-column
        prop="register"
        label="签到通知"
        align="center"
        v-if="screenWidth>720"
        style="text-align:center"
      ></el-table-column>
    </el-table>
    <div style="margin-top:10px;">
      <el-pagination
        small
        layout="prev,pager,next"
        :total="50"
        style="width:200px;margin:0 auto"
      ></el-pagination>
    </div>
  </div>
</template>

<script>
import { Table, TableColumn, Input, Col, Row, Button,Tag,Pagination } from 'element-ui';
var ElTable = Table,
    ElTableColumn = TableColumn,
    ElCol = Col,
    ElRow = Row,
    ElInput = Input,
    ElButton = Button,
    ElTag = Tag,
    ElPagination = Pagination
export default {
  components: {
    ElTable,
    ElTableColumn,
    ElInput,
    ElRow,
    ElCol,
    ElButton,
    ElTag,
    ElPagination
  },
  data() {
    return {
      tableData: [
        {
          name: {
            name: '张三',
            show: true
          },
          phone: '123456789',
          work: '未知',
          num: '555',
          arrive: true
        },
        {
          name: {
            name: '熊大',
            show: false
          },
          phone: '1475456',
          work: '未知',
          num: '555',
          arrive: true
        },
        {
          name: {
            name: '王五',
            show: false
          },
          phone: '1865465',
          work: '未知',
          num: '555',
          arrive: true,
          specially: true
        },
        {
          name: {
            name: '李四',
            show: true
          },
          phone: '5465465',
          work: '未知',
          num: '555',
          arrive: false,
          specially: false
        }
      ],
      tel: '',
      temp: null,
      isInvite: false,
      isArrive: false,
      screenWidth: ''
    }
  },
  methods: {
    getWidth() {
      this.screenWidth = window.screen.width
    },
    search() {
      this.tableData = this.temp
      this.upData()
      this.reset()
    },
    invite() {
      this.tableData = this.temp
      this.isInvite = !this.isInvite
      var newData = []
      if(this.isInvite){
        for(var i=0;i<this.tableData.length;i++){
          if(this.tableData[i].name.show){
            newData.push(this.tableData[i])
          }
        }
      }else {
        newData = this.temp
      }
      this.tableData = newData
      console.log(this.tableData)
    },
    not() {
      this.tableData = this.temp
      this.isArrive = !this.isArrive
      var newData = []
      if(this.isArrive){
        for(var i=0;i<this.tableData.length;i++){
          if(this.tableData[i].arrive){
            newData.push(this.tableData[i])
          }
        }
      }
      else {
        newData = this.temp
      }
      this.tableData = newData
    },
    attend(event) {
      var el = event.currentTarget
      console.log(el)
    },
    upData() {
      var newData = ''
      for(var i=0;i<this.tableData.length;i++){
        if(this.tel === this.tableData[i].phone){
          newData = this.tableData[i]
        }
      }
      this.tableData = [newData]
    },
    reset() {
      if(this.tel.length === 0){
        this.tableData = this.temp
      }
    }
  },
  created() {
    this.temp = this.tableData
    this.screenWidth = window.screen.width
  }
}
</script>

<style lang="scss" scoped>
  html {
    body {
      .wrap {
        width: 60%;
        max-width: 1200px;
        min-width: 320px;
        margin: 0 auto;
        margin-top:50px;
        .title {
          font-size: 22px;
          text-align: center;
          margin-bottom: 20px;
        }
        .el-table {
          .el-table-column {
            text-align: center !important;
            .arrive_tag {
              height: 40px;
              line-height: 40px;
              padding: 0 15px;
            }
          }
        }
      }
    }
  }
  .current {
    background-color: rgba(64,158,255,.1);
    color:#409EFF;
    border-color: #c6e2ff
  }
  @media screen  and (max-width: 960px){
    .wrap {
      width: 100%;
      .tel {
        min-width: 144.75px;
      }
      .special,.not {
        min-width: 70px;
      }
    }
  }
  @media screen and (max-width: 960px) {
    body {
      #check {
        .wrap {
          .select_area {
            .tel {
              .el-input {
                .el-input__inner {
                  height: 30px;
                  line-height: 30px;
                }
              }
            }
          }
        }
      }
    }
  }
</style>

