<?php


namespace App\Http\Controllers\Admin;


use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    /**
     * Desc:订单列表
     * User: cfun
     * Date: 2020/8/4
     */
    public function orderList(Request $request)
    {
        $order_list = OrderModel::with('product')
            ->select('*')
            ->where($request->only([ 'shop_id']))
            ->get();
        if ($order_list) {
            return $this->output($order_list, '请求成功', STATUS_OK);
        } else {
            return $this->output(null, '数据存在异常', ERR_REQUEST);
        }
    }
}
