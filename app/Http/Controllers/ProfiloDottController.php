<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class ProfiloDottController extends Controller
{
    //
    public function showProfile($id)
    {
        $medico = User::find($id);
        return view('UI.profilo', compact('medico'));
    }
}
