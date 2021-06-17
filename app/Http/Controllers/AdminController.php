<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    //UPDATE USER
    public function adminCurrentUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('auth.admin-current-user', ['user' => $user, 'updated' => false]);
    }

    //DELETE USER
    public function adminDeleteCurrentUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first()->delete();
        $this->adminUsers();
    }
}
