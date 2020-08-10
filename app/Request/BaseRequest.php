<?php

namespace App\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['code'=>500,'date'=>$validator->errors()], 200));

    }
}
