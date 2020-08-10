<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\OrderProductModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * Desc:创建订单
     * User: cfun
     * Date: 2020/8/5
     * @param Request $request
     */
    public function createOrder(Request $request)
    {
        $pids = $request->pid;
        $shop_id = session('login:' . 'inm.h5admin_auth_key')['shop_id'];
        $order_id = date('ymdhis');
        if ($pids) {
            DB::beginTransaction();
            $all_fee = ProductModel::whereIn('id', $pids)->sum('price');
            $order_create = OrderModel::create(['shop_id' => $shop_id, 'all_fee' => $all_fee, 'order_id' => $order_id]);
            foreach ($pids as $pid) {
                $order_product_params[] = [
                    'order_id' => $order_id,
                    'product_id' => $pid
                ];
            }
            $orderProductModel = new OrderProductModel();
            $orderProductCreate = $orderProductModel->save($order_product_params);
            if ($order_create && $orderProductCreate) {
                DB::commit();
                return $this->output($order_create->id, '成功', STATUS_OK);
            } else {
                DB::rollBack();
                return $this->output('', '下单失败', ERR_REQUEST);
            }
        }
        return $this->output('', '下单失败', ERR_REQUEST);
    }

}
