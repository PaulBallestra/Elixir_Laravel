<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function abonnement()
    {
        return view('auth.abonnements');
    }

    public function monthlyAbonnement(Request $request)
    {
        $intent = $request->user()->createSetupIntent();
        return view('auth.monthly-abonnement', compact('intent'));
    }

    public function yearlyAbonnement(Request $request)
    {
        $intent = $request->user()->createSetupIntent();
        return view('auth.yearly-abonnement', compact('intent'));
    }

    public function storeMonthly(Request $request)
    {
        $request->request->add(['plan' => '1']);
        dd($request->all());
    }

    public function storeYearly(Request $request)
    {
        $request->request->add(['plan' => '2']);
        dd($request->all());
    }

}
