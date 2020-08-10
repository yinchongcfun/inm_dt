<?php
namespace App\Http\Service;

use Illuminate\Support\Facades\Log;
use Yansongda\Pay\Pay;

class WeChatService
{
    public function wechatPay($order)
    {
        $order = [
            'out_trade_no' => $order->order_id,
            'body' => 'inm地摊经济',
            'total_fee' => $order->all_fee,
        ];
        try {
            return Pay::wechat(config('wechat.pay'))->mp($order);
        } catch (Exception $e) {
            Log::info(date("H:i:s") . '订单:'.$order->order_id);
           return false;
        }
    }

    /**
     * 支付回调
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function notify()
    {
        try {
            Log::info('微信支付回调开始<================================支付中');
            $pay = Pay::wechat(config('pay.wechat'));
            $data = $pay->verify(); // 验签
            Log::debug('支付回调参数', $data->all());
            $outTradeNo = $data->out_trade_no;
            Log::info('订单编号====' . $outTradeNo);
            // 业务处理
        } catch (Exception $e) {
            Log::error('微信回调错误', [$e->getMessage()]);
        }
        Log::info('微信支付回调结束================================>支付已完成');
    }

}
