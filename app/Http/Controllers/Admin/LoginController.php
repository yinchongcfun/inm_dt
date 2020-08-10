<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShopModel;
use App\Request\LoginRequest;


class LoginController extends BaseController{

    public function login(LoginRequest $request)
    {
        $shop_info = ShopModel::where('shop_id', $request->shop_id)->first();
        if (md5($request->shop_pwd) == $shop_info->shop_pwd) {
            session(['login:' . config('inm.h5admin_auth_key') => $shop_info]);
        } else {
            return $this->output('登录失败');
        }
    }
}
