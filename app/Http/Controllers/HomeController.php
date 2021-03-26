<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specializzazione;

use App\User;

class HomeController extends Controller
{
    //
    public function index()
    {
        $specializzazioni = Specializzazione::all();
        //dd($user);

        return view('welcome',compact('specializzazioni'));
    }

    public function search(Request $request)
    {
        $doctors = new \App\User();

        if (!empty(request('specializzazione'))) {
            $doctors= $doctors->whereHas('specializzaziones',function($query)
            {
                $query->where('descrizione','=',request('specializzazione'));
            } );
        }

        $doctors = $doctors->get();

        dd($doctors);
    }
}
