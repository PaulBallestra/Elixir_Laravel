<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileFormRequest;
use App\Http\Requests\ActualiteFormRequest;
use App\Http\Requests\PlanFormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AdminController extends Controller
{

    // ADMIN
    public function admin()
    {
        $nbUsers = DB::table('users')->count();
        $nbActualites = DB::table('actualites')->count();
        $nbPlans = DB::table('plans')->count();

        return view('auth.admin.admin', ['nbUsers' => $nbUsers, 'nbActualites' => $nbActualites, 'nbPlans' => $nbPlans]);
    }

    /* USERS */
    //LIST USERS
    public function adminUsers()
    {
        $users = DB::table('users')->get(); //get all users
        return view('auth.admin.admin-users', ['users' => $users, 'message' => null]);
    }

    //PAGE create new user
    public function adminNewUser()
    {
        return view('auth.admin.admin-create-user', ['message' => null]);
    }

    //FUNCTION create new user
    public function adminCreateNewUser(ProfileFormRequest $request)
    {
        $create = [];

        //Check de l'email a la main
        if(User::where('email_address', '=', $request->email_address)->first()){

            //REDIRECT EXISTE DEJA
            return view('auth.admin.admin-create-user', ['message' => 'Cette adresse email est déjà utilisée !']);

        }else{
            $create += [
                'email_address' => $request->email_address
            ];
        }

        //VERIFIEZ QU'IL NE REMPLI PAS QU'UN SEUL CHAMPS DE L'ADDRESSE
        if(is_null($request->address) && is_null($request->town) && is_null($request->postal_code)){
            $create += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
            ];
        }else if(is_null($request->address) || is_null($request->town) || is_null($request->postal_code)){
            return view('auth.admin.admin-create-user', ['message' => 'L\'adresse est incomplète !']);
        }else{
            $create += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
                'address' => $request->address,
                'town' => $request->town,
                'postal_code' => $request->postal_code
            ];
        }

        //Integration du password si il l'a changé (il ne laisse pas vide le champs password)
        if(!is_null($request->password)){
            $create += ['password' => Hash::make($request->password)];
        }

        //Update de is_admin
        if(!is_null($request->is_admin))
            $create += ['is_admin' => 1];
        else
            $create += ['is_admin' => 0];

        // UPDATE DE L'USER
        DB::table('users')->insert($create);

        //On réaffiche la page avec les infos modifiées et un message
        $users = DB::table('users')->get();

        //return view('auth.admin.admin-users', ['users' => $users, 'message' => 'Utilisateur créé avec succès !']);
        //return redirect('/admin/users', ['users' => $users, 'message' => 'Utilisateur créé avec succès !']);

        return redirect(route('admin.users'))->with(['users' => $users])->with('success', 'Utilisateur créé avec succès !');

    }

    //UPDATE PAGE USER
    public function adminCurrentUser($id)
    {
        $checkId = DB::table('users')->where('id', $id)->first();

        if(is_null($checkId)){
            $users = DB::table('users')->get();
            return redirect(route('admin.users'))->with('users', $users);
        }


        $user = DB::table('users')->where('id', $id)->first();
        return view('auth.admin.admin-current-user', ['user' => $user, 'message' => null, 'messageGreen' => null]);
    }

    //UPDATE FUNCTION USER
    public function adminUpdateCurrentUser(ProfileFormRequest $request, $id)
    {
        $checkId = DB::table('users')->where('id', $id)->first();

        if(is_null($checkId)){
            $users = DB::table('users')->get();
            return redirect(route('admin.users'))->with('users', $users);
        }

        $user = DB::table('users')->where('id', $id)->first();

        $update = [];

        //Check de l'email a la main
        if($request->email_address === $user->email_address){
            //On n'ajoute rien dans le update
        }else if(User::where('email_address', '=', $request->email_address)->first()){

            //REDIRECT EXISTE DEJA
            return view('auth.admin.admin-current-user', ['user' => $user, 'message' => 'Cette adresse email est déjà utilisée !', 'messageGreen' => null]);

        }else{
            $update += [
                'email_address' => $request->email_address
            ];
        }

        //Check du password a la main
        if($request->password){
            $update += [
                'password' => $request->password
            ];
        }

        //VERIFIEZ QU'IL NE REMPLI PAS QU'UN SEUL CHAMPS DE L'ADDRESSE
        if(is_null($request->address) && is_null($request->town) && is_null($request->postal_code)){
            $update += [
                'family_name' => $request->family_name,
                'given_name' => $request->given_name,
            ];
        }else if(is_null($request->address) || is_null($request->town) || is_null($request->postal_code)){
            return view('auth.admin.admin-current-user', ['user' => $user, 'message' => 'L\'adresse est incomplète !', 'messageGreen' => null]);
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
        return view('auth.admin.admin-current-user', ['user' => $valuesChangedUser, 'messageGreen' => 'Utilisateur mis à jour avec succès !', 'message' => null]);

    }

    //DELETE USER
    public function adminDeleteCurrentUser($id)
    {
        $checkId = DB::table('users')->where('id', $id)->first();

        if(is_null($checkId)){
            $users = DB::table('users')->get();
            return redirect(route('admin.users'))->with('users', $users);
        }

        DB::table('users')->where('id', $id)->delete();

        $users = DB::table('users')->get();

        return redirect(route('admin.users'))->with(['users' => $users])->with('success', 'Utilisateur supprimé avec succès !');

    }


    /* ACTUALITES */
    //LIST ACTUALITES
    public function adminActualites()
    {
        $actualites = DB::table('actualites')->get(); //get all actus
        return view('auth.admin.admin-actualites', ['actualites' => $actualites, 'message' => null]);
    }

    //View update current actualite
    public function adminCurrentActualite($id)
    {
        $checkId = DB::table('actualites')->where('id', $id)->first();

        if(is_null($checkId)){
            $actualites = DB::table('actualites')->get();
            return redirect(route('admin.actualites'))->with('actualites', $actualites);
        }

        $actualite = DB::table('actualites')->where('id', $id)->first();
        return view('auth.admin.admin-current-actualite', ['actualite' => $actualite, 'message' => null]);
    }

    //Function update current actualité
    public function adminUpdateCurrentActualite(ActualiteFormRequest $request, $id)
    {
        $checkId = DB::table('actualites')->where('id', $id)->first();

        if(is_null($checkId)){
            $actualites = DB::table('actualites')->get();
            return redirect(route('admin.actualites'))->with('actualites', $actualites);
        }

        $actualite = DB::table('actualites')->where('id', $id)->first();

        $updateValues = [
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ];

        //Check si l'image doit changer
        if($request->image){

            $result = $request->image->storeOnCloudinary();

            $updateValues += [
                'image' => $result->getSecurePath()
            ];
        }

        //IS visible
        if($request->is_visible)
            $updateValues += ['is_visible' => true];
        else
            $updateValues += ['is_visible' => false];


        DB::table('actualites')
            ->where(['id' => $actualite->id])
            ->update($updateValues);

        $actualite = DB::table('actualites')->where('id', $actualite->id)->first();
        return view('auth.admin.admin-current-actualite', ['actualite' => $actualite, 'message' => 'Actualité mise à jour !']);
    }

    //View create new actualite
    public function adminNewActualite()
    {
        return view('auth.admin.admin-create-actualite');
    }

    //Function create new actualite
    public function adminCreateNewActualite(ActualiteFormRequest $request)
    {
        //Validations avec la request

        //Upload de l'img sur cloudinary
        $result = $request->image->storeOnCloudinary();

        $createValues = [
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $result->getSecurePath()
        ];

        if($request->is_visible)
            $createValues += ['is_visible' => true];
        else
            $createValues += ['is_visible' => false];

        DB::table('actualites')->insert($createValues);

        $actualites = DB::table('actualites')->get(); //get all actus

        return redirect(route('admin.actualites'))->with(['actualites' => $actualites])->with('success', 'Actualité créée avec succès !');
    }


    public function adminDeleteCurrentActualite($id)
    {
        $checkId = DB::table('actualites')->where('id', $id)->first();

        if(is_null($checkId)){
            $actualites = DB::table('actualites')->get();
            return redirect(route('admin.actualites'))->with('actualites', $actualites);
        }

        DB::table('actualites')->where('id', $id)->delete();

        $actualites = DB::table('actualites')->get();

        //return view('auth.admin.admin-actualites', ['actualites' => $actualites, 'message' => 'Actualité supprimée avec succès !']);
        return redirect(route('admin.actualites'))->with(['actualites' => $actualites])->with('success', 'Actualité supprimée avec succès !');

    }



    /* PLANS */
    //LIST PLANS
    public function adminPlans()
    {
        $plans = DB::table('plans')->get(); //get all plans
        return view('auth.admin.admin-plans', ['plans' => $plans, 'deleted' => false]);
    }

    //VIEW CREATE PLAN
    public function adminNewPlan()
    {
        return view('auth.admin.admin-create-plan', ['message' => null]);
    }

    //FUNCTION CREATE PLAN
    public function adminCreateNewPlan(PlanFormRequest $request)
    {
        $create = [
            'name' => $request->name,
            'price' => $request->price,
            'stripe_id' => $request->stripe_id,
        ];

        //CHECK STRIPE ID
        DB::table('plans')->insert($create);

        $plans = DB::table('plans')->get();

        return redirect(route('admin.plans'))->with(['plans' => $plans])->with('success', 'Plan créé avec succès !');
    }


    //VIEW PAGE CURRENT PLAN
    public function adminCurrentPlan($id)
    {
        $checkId = DB::table('plans')->where('id', $id)->first();

        if(is_null($checkId)){
            $plans = DB::table('plans')->get();
            return redirect(route('admin.plans'))->with('plans', $plans);
        }

        $plan = DB::table('plans')->where('id', $id)->first();
        return view('auth.admin.admin-current-plan', ['plan' => $plan, 'message' => null]);
    }

    //FUNCTION UPDATE CURRENT PLAN
    public function adminUpdateCurrentPlan(PlanFormRequest $request, $id)
    {
        $checkId = DB::table('plans')->where('id', $id)->first();

        if(is_null($checkId)){
            $plans = DB::table('plans')->get();
            return redirect(route('admin.plans'))->with('plans', $plans);
        }


        $update = [
            'name' => $request->name,
            'price' => $request->price,
            'stripe_id' => $request->stripe_id,
        ];

        //CHECK STRIPE ID

        DB::table('plans')->where('id', $id)->update($update);

        $plan = DB::table('plans')->where('id', $id)->first();

        return view('auth.admin.admin-current-plan', ['plan' => $plan, 'message' => 'Plan mis à jour !']);
    }

    //FUNCTION DELETE CURRENT PLAN
    public function adminDeleteCurrentPlan($id)
    {
        $checkId = DB::table('plans')->where('id', $id)->first();

        if(is_null($checkId)){
            $plans = DB::table('plans')->get();
            return redirect(route('admin.plans'))->with('plans', $plans);
        }

        $planToDelete = DB::table('plans')->where('id', $id)->first();

        DB::table('plans')->where('id', $id)->delete();

        $plans = DB::table('plans')->get();
        return redirect(route('admin.plans'))->with(['plans' => $plans])->with('success', 'Plan supprimé avec succès !');
    }

}
