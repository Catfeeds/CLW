<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <link rel="shortcut icon" href="{{res('/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>楚楼网</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="{{res('/js/we_manifest.js')}}"></script>
    <script src="{{res('/js/we_vendor.js')}}"></script>
    <style>
        .flex{
            display: flex;
        }
        .main{
            margin-top: 10px;
            font-size: 13px;
            color: #999999;
            border: 1px solid #f2f2f2;
        }
        .list-header{
            display: flex;
            margin: 5px 0px;
        }
        .list-body{
            background-color: #fcfcfc;
            border: 1px solid #f2f2f2;
            margin: 0px 10px 10px 10px;
        }
        .list-body div{
            padding: 5px;
        }
        .list-bottom{
            border-top: 1px solid #f2f2f2;
            display: flex;
            margin-bottom: 10px;
        }
        .f-1{
            display: flex;
            flex: 1;
        }
        .jus-center {
            justify-content: center;
        }
        .jus-end {
            justify-content: flex-end;
        }
        span{
            padding: 5px;
        }
    </style>
</head>
<body>
<div id="app">
    <mt-navbar v-model="selected">
        <mt-tab-item id="1">待处理</mt-tab-item>
        <mt-tab-item id="2">已处理</mt-tab-item>
    </mt-navbar>
    <!-- tab-container -->
    <mt-tab-container v-model="selected">
        <mt-tab-container-item id="1">
            <div class="main">
                <div class="list-header">
                    <div class="f-1 jus-center"><span>工单号: </span><span> gd20180512</span></div>
                    <div class="f-1 jus-center"><span>录入时间: </span><span>2017-06-01 16:00</span></div>
                </div>
                <div class="list-body">
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div class="f-1 jus-end" >
                        <mt-button size="small" type="danger" plain @click="sheet()">分配</mt-button>
                    </div>
                </div>
            </div>
        </mt-tab-container-item>
        <mt-tab-container-item id="2">
            <div class="main">
                <div class="list-header">
                    <div class="f-1 jus-center"><span>工单号: </span><span> gd20180512</span></div>
                    <div class="f-1 jus-center"><span>录入时间: </span><span>2017-06-01 16:00</span></div>
                </div>
                <div class="list-body">
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div><span>需求:</span><span>投放房源</span></div>
                    <div class="list-bottom">
                        <span class="f-1"><i>* </i>分配给业务员A</span>
                        <span class="f-1 jus-center">已确定</span>
                    </div>
                </div>
            </div>
        </mt-tab-container-item>
    </mt-tab-container>
    <mt-actionsheet
            :actions="actions"
            v-model="sheetVisible">
    </mt-actionsheet>
</div>
<script src="/js/we_work_order.js"></script>
</body>
</html>