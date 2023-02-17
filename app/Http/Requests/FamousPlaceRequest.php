<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamousPlaceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_famous' => 'required|unique:famousplace',
        ];
    }
    public function messages()
    {
        return [
            'name_famous.required' => 'Vui lòng nhập tên địa danh',
            'name_famous.unique' => 'Tên địa danh đã tồn tại',
        ];
    }
}
