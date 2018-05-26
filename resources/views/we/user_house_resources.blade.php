@extends('we.layout')
@section('title', '楚楼网')
@section('header')
    <link rel="stylesheet" href="{{res('/css/we_user_house_resources.css')}}">
@endsection
@section('body')
<div class="mui-content">
        <!-- 称谓 -->
        <div class="first">
            <div class="input">
                <input type="text" id="appellation" value="" placeholder="称谓">  
            </div>
            <!-- 电话 -->
            <div class="input">
                <input type="tel" id="tel" placeholder="电话">
            </div>
        </div>
        <div class="second">
            <!-- 区域 -->
            <div class="mui-row">
                <div class="mui-col-xs-6 area">
                    <div class="mui-row" id="down">
                        <div class="mui-col-xs-6 region">区域</div>
                        <div class="mui-col-xs-4" id="title" >武昌区</div>
                        <div class="mui-col-xs-2"><img style="width: 9px;height:5px;margin-bottom:3px;"src="{{res('/we_img/house_detail_down.png')}}"></div>
                    </div>
                </div>
                <div class="mui-col-xs-6 acreage">
                    <div class="mui-row">
                        <div class="mui-col-xs-10">
                            <input type="tel" placeholder="面积" id="acreage">
                        </div>
                        <div class="mui-col-xs-2">m²</div>
                    </div>
                </div>
            </div>
            <!-- 楼盘名称 -->
            <div class="input">
                <input type="text" id="buildingName" placeholder="楼盘名称">
            </div>
        </div>
        <div class="loginOut">
            <button type="button">提交</button>
        </div>
        <div id="picker" style="display:none;background:#fff;position:fixed;bottom:0;width:100%;margin: 0 -15px;">
            <div style="display:flex;justify-content: space-between; padding: 15px 20px;"><span id="cancel" style="display:inline-block;width:50px;height: 50px;line-height:50px;text-align:center">取消</span>
            <span id="confirm" style="display:inline-block;width:50px; height:50px;line-height:50px;text-align:center">确认</span></div>
            <mt-picker  :slots="slots" :visible-item-count="5" @change="onValuesChange"></mt-picker>
        </div>
    </div>
    <script src="{{res('/js/we_user_house_resources.js')}}"></script> 
@endsection