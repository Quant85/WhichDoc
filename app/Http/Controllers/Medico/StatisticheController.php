<?php

namespace App\Http\Controllers\Medico;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StatisticheController extends Controller
{
    //
    public function index()
    {
        return view('Medico.Statistiche.statistiche');
    }
}
