<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function accueil()
    {
        return view('welcome');
    }

    //Toutes les actualites
    public function actualites()
    {
        $actualites = DB::table('actualites')->get();
        return view('actualites', ['actualites' => $actualites]);
    }

    //Une seule actualite
    public function actualite()
    {
        return view('actualite');
    }

    public function service()
    {
        return view('service');
    }

    public function contact()
    {
        return view('contact');
    }

}
