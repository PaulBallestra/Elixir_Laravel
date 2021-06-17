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
        $stripeKey = env('STRIPE_KEY');

        return view('auth.monthly-abonnement', compact('intent', 'stripeKey'));
    }

    public function yearlyAbonnement(Request $request)
    {
        $intent = $request->user()->createSetupIntent();
        $stripeKey = env('STRIPE_KEY');

        return view('auth.yearly-abonnement', compact('intent', 'stripeKey'));
    }

    public function storeMonthly(Request $request)
    {
        $request->request->add(['plan' => '1']);

        $request->validate([
            'titulaire' => 'required',
            'payment_method' => 'required',
            'plan' => 'required|exists:plans,id'
        ]);

        //Récup du plan
        $plan = Plan::find($request->plan);

        $request->user()
            ->newSubscription('default', $plan->stripe_id)
            ->create($request->payment_method);

        return view('auth.abonnements');
    }

    public function storeYearly(Request $request)
    {
        $request->request->add(['plan' => '2']);

        $request->validate([
            'titulaire' => 'required',
            'payment_method' => 'required',
            'plan' => 'required|exists:plans,id'
        ]);

        //Récup du plan
        $plan = Plan::find($request->plan);

        $request->user()
            ->newSubscription('default', $plan->stripe_id)
            ->create($request->payment_method);

        return view('auth.abonnements');
    }

}
