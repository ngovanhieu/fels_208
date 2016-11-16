<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserManage extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'email|required|',
            'avatar' => 'mimes:jpeg,png,jpg|max:5000',
            'role' => 'in:' . config('user.role-select.member') . ',' . config('user.role-select.admin'),
        ];
    }
}
