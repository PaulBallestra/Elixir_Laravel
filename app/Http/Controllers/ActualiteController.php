<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActualiteController extends Controller
{
    //Toutes les actualites
    public function actualites()
    {
        $actualites = DB::table('actualites')->where('is_visible', '=', true)->get();
        return view('actualites', ['actualites' => $actualites]);
    }

    //Une seule actualite
    public function actualite($id)
    {
        $actualite = DB::table('actualites')->where('id', $id)->first();
        $dateFormat = Carbon::parse($actualite->created_at)->format('d/m/Y');
        return view('actualite', ['actualite' => $actualite, 'dateFormat' => $dateFormat]);
    }
}
