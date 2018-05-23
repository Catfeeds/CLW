<div id="alltab" style="display:flex;position:fixed;justify-content:space-around;background:white;height:49px;z-index:300;bottom:0;
        width:100%;padding:5px 0;border-top:1px solid #f4f4f4;">
    <a class="tabs" style="text-align:center" href="/">
        @if(Request::segment(1) !== null)<img class="tab" src="/we_img/tab1.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) == null)<img class="tabactive" src="/we_img/tab1_active.png" style="height:22px;margin-bottom:-4px;">@endif
        <div class="(Request::segment(1) == null?'active' : '')" style="font-size:11px;color:#333333;">首页</div>
    </a>
    <a class="tabs" style="text-align:center" href="/buildings">
        @if(Request::segment(1) !== 'buildings')<img class="tab" src="/we_img/tab2.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) == "buildings")<img class="tabactive" src="/we_img/tab2_active.png" style="height:22px;margin-bottom:-4px;">@endif
        <div style="font-size:11px;color:#333333;">找房</div>
    </a>
    <a class="tabs" style="text-align:center" href="/servers">
        @if(Request::segment(1) !== 'servers')<img class="tab" src="/we_img/tab3.png" style="height:22px;margin-bottom:-4px;">@endif
        @if(Request::segment(1) == 'servers')<img class="tabactive" src="/we_img/tab3_active.png" style="height:22px;margin-bottom:-4px;">@endif
        <div style="font-size:11px;color:#333333;">服务</div>
    </a>
    <a class="tabs" style="text-align:center" href="/user">
        @if(Request::segment(1) !== 'user')<img class="tab" src="/we_img/tab4.png" style="height:22px;margin-bottom:-4px;" >@endif
        @if(Request::segment(1) == 'user')<img class="tabactive" src="/we_img/tab4_active.png" style="height:22px;margin-bottom:-4px;">@endif
        <div style="font-size:11px;color:#333333;">我的</div>
    </a>
</div>
<style>
    .active{
        color:#276FFB;
    }
</style>