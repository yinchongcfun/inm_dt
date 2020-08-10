<?php


namespace App\Request;


class ProductRequest extends BaseRequest
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
            'product_name' => 'required',
            'img' => 'required',
            'price' => 'required',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        $message = [
            'product_name.required' => '商品名称必须填写',
            'img.required' => '图片必须上传',
            'price.required' => '价格必填',
        ];

        return $message;
    }

}
