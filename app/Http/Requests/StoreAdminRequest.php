<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "adminName" => "required",
            "admin" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "adminName" => "管理者名",
            "admin" => "権限",
        ];
    }

    public function messages()
    {
        return [
            "adminName.required" => ":attributeを選択してください",
            "admin.required" => ":attributeを最低1つ選択してください",
        ];
    }

}
