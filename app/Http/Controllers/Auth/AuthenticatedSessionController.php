<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

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

    /* ADMIN */
    public function admin()
    {
        return view('auth.admin');
    }


    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/'); //->intended(RouteServiceProvider::HOME);
    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
