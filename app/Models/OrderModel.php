<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'order';

    protected $guarded = [];

    public function product()
    {
        return $this->hasManyThrough(ProductModel::class, OrderProductModel::class,'order_id','id','order_id','product_id');
    }
}
