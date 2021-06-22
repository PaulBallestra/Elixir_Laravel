<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'family_name' => 'required|string|max:255',
            'given_name' => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'family_name' => $request->family_name,
            'given_name' => $request->given_name,
            'email_address' => $request->email_address,
            'password' => Hash::make($request->password),
            'is_admin' => false
        ]);

        //Si c'est le premier user, on le passe en admin
        if($user->id === 1){
            DB::table('users')->where('id', $user->id)->update(['is_admin' => 1]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
