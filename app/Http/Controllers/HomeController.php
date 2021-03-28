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
        //dd($request->specializzazione);
        $doctors = new \App\User();
        //$doctors->select('Specializzaziones','profile','prestaziones','ratings')->get();
        //dd($doctors);
        if (!empty(request('specializzazione'))) {
            $doctors= $doctors->whereHas('specializzaziones',function($query)
            {
                $query->where('descrizione','=',request('specializzazione'));
            } );
        }

        $doctors->has('ratings');

        //dd($doctors);
        $doctors = $doctors->get();
        
    }
}
