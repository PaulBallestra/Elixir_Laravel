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
        return view('auth.admin');
    }

    public function adminUsers()
    {
        $users = DB::table('users')->get(); //get all users

        return view('auth.admin-users', ['users' => $users]);
    }

    public function adminCurrentUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('auth.admin-current-user', ['user' => $user, 'updated' => false]);
    }
}
