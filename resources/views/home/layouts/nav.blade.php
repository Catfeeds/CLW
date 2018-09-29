<style>
    .navTitle:hover{
        color: #007bff;
    }
    .navTitle{
        font-size:12px;
        color:#999;
    }
</style>
@if(!empty(count($data)) and array($data))
<div class="nav">
<a href="{{url('/')}}"><span class="navTitle">首页</span></a>
@for($i = 0; $i < count($data); $i++)
    @if($i == 0)
        <a href="{{url('/building_list?area_guid='.$data[0]['guid'])}}"><span class="navTitle">>{{$data[0]['name']}}</span></a>
    @endif
    @if($i == 1)
        <a href="{{url('/building_list?area_guid='.$data[0]['guid'].'&block_guid='.$data[1]['guid'])}}"><span class="navTitle">>{{$data[1]['name']}}</span></a>
    @endif
    @if($i == 2)
        @if(count($data) > 3)
        <a href="{{url('/buildings/'.$data[2]['guid'])}}"><span class="navTitle">>{{$data[2]['name']}}</span></a>
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
