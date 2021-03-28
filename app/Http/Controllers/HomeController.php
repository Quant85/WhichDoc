<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specializzazione;

use App\User;
use App\Profile;

class HomeController extends Controller
{
    //
    public function index()
    {
        $specializzazioni = Specializzazione::all();
        //dd($user);

        $medici = User::all();
        $profilo = Profile::all();

        return view('welcome',compact('specializzazioni', 'medici','profilo'));
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
