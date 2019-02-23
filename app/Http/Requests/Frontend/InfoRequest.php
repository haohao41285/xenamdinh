<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten_xe'=>'required',
            'ava'=>'image|max:2000'
            'thoi_gian.thoi_gian_di' => 'required',
            'thoi_gian.thoi_gian_ve' =>'required',
            'tinh'=>'required',
            'huyen'=>'required',
            'xa'=>'reqired',
            'lien_he_1'=>'required|numeric|unique:xe_khachs,lien_he_1|unique:xe_khachs,lien_he_1',
            'lien_he_2'=>'numeric'
        ];
    }
    public function messages()
    {
        return [
            'ava.image' => 'Ảnh đai diên không đúng định dạng',
            'ava.max' => 'Dung lương ảnh không quá 2MB',
            'ten_xe.required' => 'Tên nhà xe bắt buộc',
            'thoi_gian.thoi_gian_di.required' => 'Thời gian là bắt buộc',
            'thoi_gian.thoi_gian_ve.required' => 'Thời gian là bắt buộc',
            'tinh.required' => 'Tỉnh là bắt buộc',
            'xa.required' => 'Xã là bắt buộc',
            'lien_he_1.required' =>'Liên hệ là bắt buộc',
            'lien_he_2.numeric' => 'Vui lòng điền số vào liên hệ'
        ];
    }
}
