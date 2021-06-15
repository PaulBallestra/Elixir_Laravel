<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    /* PROFILE */
    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    public function saveProfile(ProfileFormRequest $request)
    {

        //VERIFIEZ QU'IL NE REMPLI PAS QU'UN SEUL CHAMPS DE L'ADDRESSE
        /*if(is_null($request->address) && is_null($request->town) && is_null($request->postal_code)){
            dd('allnull');
        }else{
            dd('au moin un est rempli');
        }*/
        $user = User::findOrFail(Auth::user()->id);

        return view('auth.profile', ['user' => Auth::user()]);
    }
}
