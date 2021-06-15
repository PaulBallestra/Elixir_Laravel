<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'family_name' => 'required|string|max:255',
            'given_name' => 'required|string|max:255',
            'email_address' => 'required|email',
            'address' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'postal_code' => 'nullable'
        ];
    }
}
