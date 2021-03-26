<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specializzazione;

class HomeController extends Controller
{
    //
    public function index()
    {
        $specializzazioni = Specializzazione::all();
        //dd($user);

        return view('welcome',compact('specializzazioni'));
    }
}
