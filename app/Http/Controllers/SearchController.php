<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        /* dd($request);
        $q = $request->get('q'); */
        $resulte = new \App\User();

        if (!empty(request('q'))) {
            $resulte= $resulte->whereHas('specializzaziones',function($query)
            {
                $query->where('descrizione','LIKE','%'.request('q').'%');
            } );
        }

        //$resulte->has('ratings');

        //dd($doctors);
        $resulte = $resulte->get();

        //dd($resulte);
        $resulte = response()->json($resulte);
        //dd($resulte);

        return view('UI.advanced_search');
    }

    public function red()
    {
        return view('UI.advanced_search');
    }
}
