<?php


namespace App\Request;


class LoginRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            'shop_id'    => 'required |exists:shop,shop_id',
            'shop_pwd'    => 'required',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $message = [
            'shop_id.required'    => '店铺id必须填写',
            'shop_pwd.required'    => '密码必须填写',
            'shop_id.exists'       => '店铺不存在',
        ];

        return $message;
    }

}
