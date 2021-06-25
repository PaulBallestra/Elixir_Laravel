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
            'content_email' => 'required|string',

        ]);

        //MAILTRAP

        $details = [
            'family_name' => $request->family_name,
            'given_name' => $request->given_name,
            'email_address' => $request->email_address,
            'objet' => $request->objet,
            'content_email' => $request->content_email,
        ];

        \Mail::to('contact@elixir.com')->send(new \App\Mail\ContactMail($details));

        return redirect(route('contact'))->with('success', 'Question envoyée avec succès !');
    }
}
