<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Models\Admin;
use EasyWeChat\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class WechatController extends APIBaseController
{
    private $wechat;

    public function __construct(Application $application)
    {
        $this->wechat = $application;
    }

    /**
     * 说明: 扫描二维码绑定用户openId到数据库
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \EasyWeChat\Core\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Server\BadRequestException
     * @author 刘坤涛
     */
    public function index()
    {
        // $user= Auth::guard('admin')->user();
        $this->wechat->server->setMessagehandler(function($message) {
            if ($message->MsgType == 'event' && $message->Event == 'SCAN') {
                if (Admin::where('open_id', $message->FromUserName)->first()) return '请勿重复绑定';
                $res = Admin::where('id', 1)->update([
                    'open_id' => $message->FromUserName
                ]);
                if (!$res) return '绑定失败,请稍后重新尝试';
                return '绑定成功';
            } else {
                return '有什么需要可以拨打客服电话4000-580-888~';
            }
        });
        return $this->wechat->server->serve();
    }


    /**
     * 说明: 生成二维码
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author 刘坤涛
     */
    public function create()
    {
        $qrcode = $this->wechat->qrcode;
        $res = $qrcode->forever(56);
        $url = $qrcode->url($res->ticket);
        return view('test')->with('url', $url);
    }

    /**
     * 说明: 生成自定义菜单
     *
     * @author 刘坤涛
     */
    public function menu()
    {
        $menu = $this->wechat->menu;
        $buttons = [
            [
                "type" => "view",
                "name" => "找你所想",
                "url"  => "https://wechat.chulouwang.com"
            ],
            [
                "name"       => "更多",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "用户中心",
                        "url" => "https://wechat.chulouwang.com/user"
                    ],
                    [
                        "type" => "view",
                        "name" => "APP下载",
                        "url"  => "https://wechat.chulouwang.com/download"
                    ],
                    [
                        "type" => "click",
                        "name" => "联系客服",
                        "key" => "KEY_0102"
                    ],
                    [
                        "type" => "miniprogram",
                        "name" => "房源一站通",
                        "url" => "https://wechat.chulouwang.com/user",
                        "appid" => "wx00dc0b3638445400",
                        "pagepath" => "pages/list/list"
                    ],
                ],
            ],
        ];
        $menu->add($buttons);
        return 'ok';
    }
}