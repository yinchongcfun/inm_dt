<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShopModel;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //商铺登录
    public function shopLogin(Request $request)
    {
        //登录成功,记录cookie
        $shop_info = ShopModel::where('shop_id', $request->shop_id)->first();
        if ($shop_info&&md5($request->shop_pwd) == $shop_info->shop_pwd) {
            session(['login:' . config('inm.h5admin_auth_key') => $shop_info->shop_id]);
            return $this->output(null,'登录成功',STATUS_OK);
        } else {
            return $this->output(null,'登录失败',ERR_REQUEST);
        }
    }
}
