<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;

class ProductController extends Controller
{
    /**
     * Desc:产品列表
     * User: cfun
     * Date: 2020/8/5
     */
    public function productList()
    {
        $product_info = ProductModel::select('*')->get();
        if ($product_info) {
            return $this->output($product_info, '请求成功', STATUS_OK);
        } else {
            return $this->output(null, '数据存在异常', ERR_REQUEST);
        }
    }
}
