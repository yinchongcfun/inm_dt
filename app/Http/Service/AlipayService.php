<?php
namespace App\Http\Service;

use BaconQrCode\Encoder\QrCode;
use Yansongda\Pay\Pay;

class AlipayService
{
    public function aliPay($order)
    {
        $aliPayOrder = [
            'out_trade_no' => $order->order_id,
            'total_amount' => $order->all_fee,
            'subject' =>'inm地摊经济'
        ];
        $config = config('alipay.pay');
        $config['return_url'] = $config['return_url'].'?id='.$order->order_id;
        return Pay::alipay($config)->app($aliPayOrder);

    }
}
