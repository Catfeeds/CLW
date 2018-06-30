@if(!empty(count($arrs)) and array($arrs))
<div class="nav">
@for($i = 0; $i < count($arrs); $i++)
    @if($i == 0)
        <a href="#"><span>首页</span></a>
    @endif
    @if($i == 1)
        <a href="#"><span>>{{$arrs[1]}}</span></a>
    @endif
    @if($i == 2)
        <a href="#"><span>>{{$arrs[2]}}</span></a>
    @endif
    @if($i == 3)
        <a href="#"><span>>{{$arrs[3]}}</span></a>
    @endif
@endfor
</div>
@endif
