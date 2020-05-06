<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'      => 'required|min:2|unique:posts,title',
            'content'     => 'required|min:10',
            'image'         => 'image',
        ];
    }
    public function messages(){
        return [
             'title.required' => 'Bạn phải nhâp',
             'title.min' => "Tối thiểu 2 chữ",
             'title.unique' => "Tiêu đề đã tồn tại",
             'content.required' => 'bạn phải nhập',
             'content.min' => 'Nội dung trên 10 ký tự',
             'content.image' => 'Chưa đúng chuẩn ảnh'
        ];
    }
}
