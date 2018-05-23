<div id="alltab" style="display:flex;position:fixed;justify-content:space-around;background:white;height:49px;z-index:300;bottom:0;
        width:100%;padding:5px 0;border-top:1px solid #f4f4f4;">
    <a class="tabs" style="text-align:center" href="/">
        @if(Request::segment(1) !== null)<img src="/we_img/tab1.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) == null)<img src="/we_img/tab1_active.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) !== null)<div style="font-size:11px;color:#333333;">首页</div>@endif
        @if(Request::segment(1) == null)<div style="font-size:11px;color:#276FFB;">首页</div>@endif
    </a>
    <a class="tabs" style="text-align:center" href="/buildings">
        @if(Request::segment(1) !== 'buildings')<img src="/we_img/tab2.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) == "buildings")<img src="/we_img/tab2_active.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) !== 'buildings')<div style="font-size:11px;color:#333333;">找房</div>@endif
        @if(Request::segment(1) == 'buildings')<div style="font-size:11px;color:#276FFB;">找房</div>@endif
    </a>
    <a class="tabs" style="text-align:center" href="/servers">
        @if(Request::segment(1) !== 'servers')<img src="/we_img/tab3.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) == 'servers')<img src="/we_img/tab3_active.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) !== 'servers')<div style="font-size:11px;color:#333333;">服务</div>@endif
        @if(Request::segment(1) == 'servers')<div style="font-size:11px;color:#276FFB;">服务</div>@endif
    </a>
    <a class="tabs" style="text-align:center" href="/user">
        @if(Request::segment(1) !== 'user')<img src="/we_img/tab4.png" style="height:22px;margin-bottom:-4px;" >@endif
        @if(Request::segment(1) == 'user')<img src="/we_img/tab4_active.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) !== 'user')<div style="font-size:11px;color:#333333;">我的</div>@endif
        @if(Request::segment(1) == 'user')<div style="font-size:11px;color:#276FFB;">我的</div>@endif
    </a>
</div>