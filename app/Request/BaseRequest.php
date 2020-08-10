<?php

namespace App\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        if($this->container['request'] instanceof \Illuminate\Http\Request){
            $error= $validator->errors()->all();
            throw new HttpResponseException(response()->json(['msg'=>$error[0],'code'=>500,'date'=>''], 200));
        }
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
