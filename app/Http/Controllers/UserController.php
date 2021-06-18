<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /* PROFILE */
    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user(), 'updated' => false, 'customError' => false]);
    }

    public function saveProfile(ProfileFormRequest $request)
    {
        //Variable pour preparer la requete
        $update = [];

        //Check de l'email a la main
        if($request->email_address === Auth::user()->email_address){
            //On n'ajoute rien dans le update
        }else if(User::where('email_address', '=', $request->email_address)->first()){

            //REDIRECT EXISTE DEJA
            return view('auth.profile', ['user' => Auth::user(), 'updated' => false, 'customError' => 'Cette adresse email est déjà utilisée !']);

        }else{
            $update += [
                'email_address' => $request->email_address
            ];
        }

        //VERIFIEZ QU'IL NE REMPLI PAS QU'UN SEUL CHAMPS DE L'ADDRESSE
        if(is_null($request->address) && is_null($request->town) && is_null($request->postal_code)){
            $update += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
            ];
        }else{
            $update += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
                'address' => $request->address,
                'town' => $request->town,
                'postal_code' => $request->postal_code
            ];
        }

        //Integration du password si il l'a changé (il ne laisse pas vide le champs password)
        if(!is_null($request->password)){
            $update += ['password' => Hash::make($request->password)];
        }

        // Modif du updated_at qui n'etait pas automatique
        $updatedDate = date('Y-m-d H:i:s');
        $update += ['updated_at' => $updatedDate];

        //Récupération de l'user
        $user = User::findOrFail(Auth::user()->id);

        //update de l'email si besoin
        if($request->email_address != $user->email_address){
            $update += ['email_address' => $request->email_address];
        }

        // UPDATE DE L'USER
        DB::table('users')
            ->where(['id' => $user->id])
            ->update($update);

        //On rechope les valeurs de l'user modifié
        $valuesChangedUser = DB::table('users')->where(['id' => $user->id])->first();

        //On réaffiche la page avec les infos modifiées et un message
        return view('auth.profile', ['user' => $valuesChangedUser, 'updated' => true, 'customError' => false]);
    }
}
