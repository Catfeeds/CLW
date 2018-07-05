@if(!empty(count($arrs)) and array($arrs))
<div class="nav">
@for($i = 0; $i < count($arrs); $i++)
    @if($i == 0)
        <a href="{{url('/')}}"><span style="font-size:12px; color:#999">首页</span></a>
    @endif
    @if($i == 1)
        <a href="#"><span style="font-size:12px; color:#999">>{{$arrs[1]}}</span></a>
    @endif
    @if($i == 2)
        <a href="#"><span style="font-size:12px; color:#999">>{{$arrs[2]}}</span></a>
    @endif
    @if($i == 3)
        <a href="#"><span style="font-size:12px; color:#999">>{{$arrs[3]}}</span></a>
    @endif
@endfor
</div>
@endif
