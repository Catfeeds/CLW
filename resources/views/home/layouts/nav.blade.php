<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .navTitle:hover{
            color: #007bff;
        }
        .navTitle{
            font-size:12px;
            color:#999;
        }
    </style>
</head>
<body>
@if(!empty(count($data)) and array($data))
<div class="nav">
<a href="{{url('/')}}"><span class="navTitle">首页</span></a>
@for($i = 0; $i < count($data); $i++)
    @if($i == 0)
        <a href="{{url('/building_list?area_id='.$data[0]['id'])}}"><span class="navTitle">>{{$data[0]['name']}}</span></a>
    @endif
    @if($i == 1)
        <a href="{{url('/building_list?area_id='.$data[0]['id'].'&block_id='.$data[1]['id'])}}"><span class="navTitle">>{{$data[1]['name']}}</span></a>
    @endif
    @if($i == 2)
        @if(count($data) > 3)
        <a href="{{url('/buildings/'.$data[2]['id'])}}"><span class="navTitle">>{{$data[2]['name']}}</span></a>
        @else
        <a href="javascript:void(0)}}"><span style="font-size:12px; color:#999">>{{$data[2]['name']}}</span></a>
        @endif
    @endif
    @if($i == 3)
        <a href="javascript:void(0)"><span style="font-size:12px; color:#999">>{{$data[3]['name']}}出租房源</span></a>
    @endif
@endfor
</div>
@endif
</body>
</html>

