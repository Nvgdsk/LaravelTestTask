<?php

namespace Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => 'required|string|regex:/^\+?[0-9]{10,15}$/',
            'user_name' => 'required|string|max:255',
        ];
    }
}
