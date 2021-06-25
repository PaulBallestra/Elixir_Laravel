<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {

        //dd($request);

        //Validations
        $request->validate([
            'family_name' => 'required|string',
            'given_name' => 'required|string',
            'email_address' => 'required|string',
            'objet' => 'required|string',
            'content' => 'required|string',

        ]);

        //MAILTRAP

    }
}
