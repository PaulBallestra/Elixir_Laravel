<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ProfileFormRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'family_name' => 'required|string|max:255',
            'given_name' => 'required|string|max:255',
            //'email_address' => 'required|email|unique:users', check fait plus tard
            //'password' => 'required', check fait plus tard
            'address' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'postal_code' => 'nullable|integer'
        ];
    }
}
