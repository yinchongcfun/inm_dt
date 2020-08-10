<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function output($data = [], $msg = 'ok', $code = 200, $status = 200, array $headers = [], $options = 0)
    {
        return response()->json(compact('msg', 'code', 'data'), $status, $headers, $options);
    }
}
