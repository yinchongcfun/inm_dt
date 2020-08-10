<?php


namespace App\Http\Controllers\Admin;


use App\Models\ProductModel;
use App\Request\ProductRequest;
use Illuminate\Http\Request;


class ProductController extends BaseController
{
    /**
     * Desc:添加商品
     * User: cfun
     * Date: 2020/8/4
     */
    public function create(Request $productRequest)
    {
        $productRequest=[
            'product_name'=>$productRequest->product_name??'',
            'price'=>$productRequest->price,
            'img'=>$productRequest->img,
        ];
        $product_info = ProductModel::create($productRequest);
        if ($product_info) {
            return $this->output($product_info, '请求成功', STATUS_OK);
        } else {
            return $this->output(null, '数据存在异常', ERR_REQUEST);
        }
    }

    /**
     * Desc:上架/下架
     * User: cfun
     * Date: 2020/8/4
     */
    public function status(Request $request)
    {
        $status = $request->status;
        $product_info = ProductModel::where('id', $request->product_id)->update(['status',$status]);
        if ($product_info) {
            return $this->output(null, '请求成功', STATUS_OK);
        } else {
            return $this->output(null, '数据存在异常', ERR_REQUEST);
        }
    }


}
