<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Exceptions\IncompletePayment;

class AbonnementController extends Controller
{
    public function abonnement()
    {
        //Récup de l'user
        $user = Auth::user();

        //Check si il a un abonnement
        $subscription = DB::table('subscriptions')->where('user_id', $user->id)->first();

        if($subscription){
            $planName = DB::table('plans')->where('stripe_id', $subscription->stripe_price)->first();

            return view('auth.abonnements', ['subscribed' => false, 'subscription' => $subscription]);
        }else{
            return view('auth.abonnements', ['subscribed' => false, 'subscription' => null]);
        }

    }

    public function monthlyAbonnement(Request $request)
    {

        //Vérif si l'user a déjà un abonnement en cours
        if(Auth::user()->stripe_id !== null){

            //check in subscriptions db if stripe_id is active
            $oldSubscription = DB::table('subscriptions')->where('user_id', Auth::user()->id)->first();

            if($oldSubscription->stripe_status === 'active')
                return redirect(route('abonnement'))->withErrors('Vous avez déjà un abonnement en cours !');
        }

        $intent = $request->user()->createSetupIntent();
        $stripeKey = env('STRIPE_KEY');

        return view('auth.monthly-abonnement', compact('intent', 'stripeKey'));
    }

    public function yearlyAbonnement(Request $request)
    {

        //Vérif si l'user a déjà un abonnement en cours
        if(Auth::user()->stripe_id !== null){

            //check in subscriptions db if stripe_id is active
            $oldSubscription = DB::table('subscriptions')->where('user_id', Auth::user()->id)->first();

            if($oldSubscription->stripe_status === 'active')
                return redirect(route('abonnement'))->withErrors('Vous avez déjà un abonnement en cours !');
        }


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
            'plan' => 'required|integer'
        ]);

        //Récup du plan
        $plan = Plan::find($request->plan);


        try {

            $subscription = $request->user()
                ->newSubscription('default', $plan->stripe_id)
                ->create($request->payment_method);

        } catch (IncompletePayment $exception) {

            //dd($exception->payment->id);

            return redirect()->route('cashier.payment', [
                $exception->payment->id, 'redirect' => route('abonnement')
            ]);

        }

        //return view('auth.abonnements', ['subscribed' => true]);
        return redirect(route('abonnement'))->with('success', 'Abonnement Mois subscribed !');
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

        try {

            $subscription = $request->user()
                ->newSubscription('default', $plan->stripe_id)
                ->create($request->payment_method);

        } catch (IncompletePayment $exception) {

            return redirect()->route('cashier.payment', [
                $exception->payment->id, 'redirect' => route('abonnement')
            ]);

        }

        return redirect(route('abonnement'))->with('success', 'Abonnement Annuel subscribed !');
    }

}
