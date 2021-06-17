<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function abonnement()
    {
        return view('auth.abonnements');
    }

    public function monthlyAbonnement()
    {
        /*return view('update-payment-method', [
            'intent' => $user->createSetupIntent()
        ]); */
        return view('auth.monthly-abonnement');
    }

    public function yearlyAbonnement()
    {
        return view('auth.yearly-abonnement');
    }

    public function store()
    {

    }

}
