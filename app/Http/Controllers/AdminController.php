<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AdminController extends Controller
{

    // ADMIN
    public function admin()
    {

        $nbUsers = DB::table('users')->count();

        return view('auth.admin', ['nbUsers' => $nbUsers]);
    }

    //LIST USERS
    public function adminUsers()
    {
        $users = DB::table('users')->get(); //get all users

        return view('auth.admin-users', ['users' => $users]);
    }

    //UPDATE PAGE USER
    public function adminCurrentUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('auth.admin-current-user', ['user' => $user, 'updated' => false, 'customError' => false]);
    }

    //UPDATE POST USER
    public function adminUpdateCurrentUser(ProfileFormRequest $request, $id)
    {

        $user = DB::table('users')->where('id', $id)->first();

        $update = [];

        //Check de l'email a la main
        if($request->email_address === $user->email_address){
            //On n'ajoute rien dans le update
        }else if(User::where('email_address', '=', $request->email_address)->first()){

            //REDIRECT EXISTE DEJA
            return view('auth.admin-current-user', ['user' => $user, 'updated' => false, 'customError' => 'Cette adresse email est déjà utilisée !']);

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
        }else if(is_null($request->address) || is_null($request->town) || is_null($request->postal_code)){
            return view('auth.admin-current-user', ['user' => $user, 'updated' => false, 'customError' => 'L\'adresse est incomplète !']);
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

        //Update de is_admin
        if(!is_null($request->is_admin))
            $update += ['is_admin' => 1];
        else
            $update += ['is_admin' => 0];

        // UPDATE DE L'USER
        DB::table('users')
            ->where(['id' => $id])
            ->update($update);

        //On rechope les valeurs de l'user modifié
        $valuesChangedUser = DB::table('users')->where(['id' => $id])->first();

        //On réaffiche la page avec les infos modifiées et un message
        return view('auth.admin-current-user', ['user' => $valuesChangedUser, 'updated' => true, 'customError' => false]);

    }

    //DELETE USER
    public function adminDeleteCurrentUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first()->delete();
        $this->adminUsers();
    }
}
