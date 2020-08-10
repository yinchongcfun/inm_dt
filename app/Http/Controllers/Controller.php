<?php

namespace App\Http\Controllers;



use Illuminate\Routing\Controller as BaseController;
use Cookie;

class Controller extends BaseController
{
    public function output($data = [], $msg = 'ok', $code = 200, $status = 200, array $headers = [], $options = 0)
    {
        return response()->json(compact('msg', 'code', 'data'), $status, $headers, $options);
    }
}
