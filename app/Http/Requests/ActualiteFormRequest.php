<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ActualiteFormRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            //'image' => 'required',
        ];
    }
}
