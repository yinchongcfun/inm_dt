<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Service\WeChatService;
use App\Http\Service\AlipayService;
use App\Models\OrderModel;
use Illuminate\Http\Request;


class PayController extends Controller
{
    public function pay(Request $request, AlipayService $alipayService, WeChatService $weChatService)
    {
        $order_id = $request->order_id;
        $shop_id = session('login:' . 'inm.h5admin_auth_key')['shop_id'];
        $order = OrderModel::where(['id'=>$order_id,'shop_id'=>$shop_id])->first();
        if($order){
            $user_agent = $request->header('user-agent');
            try {
                if (stristr($user_agent, 'MicroMessenger')) {
                    $weChatService->wechatPay($order);
                } else {
                    $alipayService->aliPay($order);
                }
            } catch (\Exception $exception) {
                info($exception->getMessage());
                return '支付异常';
            }
        }else{
            return $this->output('订单不存在');
        }

    }

}
