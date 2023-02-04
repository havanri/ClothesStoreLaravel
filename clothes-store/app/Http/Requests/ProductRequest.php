<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
    * Indicates if the validator should stop on the first rule failure.
    *
    * @var bool
    */
    protected $stopOnFirstFailure = true;
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'price'=>'required|numeric|min:0',
            'content'=>'required',
            'feature_image'=>'required|image',
            'category_id'=>'required',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
    *
    * @return array
    */
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            'price.required'=>'Vui lòng nhập giá sản phẩm',
            'content.required'=>'Vui lòng viết mô tả sản phẩm',
            'feature_image.required'=>'Phải có ảnh đại diện',
            'category_id.required'=>'Lựa chọn danh mục cho sản phẩm',
        ];
    }
}
