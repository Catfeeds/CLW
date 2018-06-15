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
    <link rel="stylesheet" href="{{res('/css/we_work.css')}}">
    <script src="{{res('/js/we_manifest.js')}}"></script>
    <script src="{{res('/js/we_vendor.js')}}"></script>
</head>
<body>
<div id="app">
    <mt-navbar v-model="selected">
        <mt-tab-item id="1">待确定</mt-tab-item>
        <mt-tab-item id="2">已确定</mt-tab-item>
    </mt-navbar>
    <!-- tab-container -->
    <mt-tab-container v-model="selected">
        <mt-tab-container-item id="1">
            <div class="main">
                <div class="list-header">
                    <div class="f-1 jus-start"><span>工单号: </span><span> gd20180512</span></div>
                </div>
                <div class="list-body">
                    <div class="one"><span>需求:</span><span> 投放房源</span></div>
                    <div><span>姓名:</span><span> 张先生</span></div>
                    <div><span>电话:</span><span> 13245655585</span></div>
                    <div><span>内容:</span><span> 光谷 </span><span> 房间卡萨见风十多件费</span></div>
                </div>
            </div>
            <div class="list-bottom">
                <div class="f-1 jus-start"><span>分配时间: </span><span>2017-06-01 16:00</span></div>
                <mt-button size="small" type="primary" plain @click="sheet()">确定</mt-button>
            </div>
        </mt-tab-container-item>
        <mt-tab-container-item id="2">
            <div class="main">
                <div class="list-header">
                    <div class="f-1 jus-start"><span>工单号: </span><span> gd20180512</span></div>
                    <div class="f-1 jus-end" style="font-weight:normal"><img src="/we_img/work_people.png">分配给业务员asdasd</div>
                </div>
                <div class="list-body">
                    <div class="one"><span>需求:</span><span> 投放房源</span></div>
                    <div><span>姓名:</span><span> 张先生</span></div>
                    <div><span>电话:</span><span> 13245655585</span></div>
                    <div><span>内容:</span><span> 光谷 </span><span> 房间卡萨见风十多件费</span></div>
                </div>
            </div>
            <div class="list-bottom">
                <div class="f-1 jus-start"><span>录入时间: </span><span>2017-06-01 16:00</span></div>
                <div><img src="/we_img/work_confirm.png"><div class="text">已录入系统</div></div>
                {{--<div><img src="/we_img/work_confirm.png"><div class="text">未录入系统</div></div>--}}
            </div>
        </mt-tab-container-item>
    </mt-tab-container>
    <mt-actionsheet
            :actions="actions"
            v-model="sheetVisible">
    </mt-actionsheet>
</div>
<script src="/js/we_work_order_salesman.js"></script>
</body>
</html>