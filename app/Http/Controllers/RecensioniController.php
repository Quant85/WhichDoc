<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class RecensioniController extends Controller
{
    //
    public function index()
    {
        # code...
        $medico = Auth::user();//questo andrà cambiato con il medico id User::find(id)nello show
        $user = User::find(1);//questo andrà cambiato con la variabile $id che verrà passato dal form
        //dd($medico, $user,$_COOKIE);
        return view('UI.recensioni',compact('medico','user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if (!$request->hasCookie('name') && ($request->cookie('name') != 'votato')) {
            # code...
            $validated_data = $request->validate([
            'user_id' => 'user_id',
            'nome_utente' => 'required',
            'data' => 'nullable',
            'body' => 'required',
            'voto' => 'required',
            
        ]);
        $validated_data['user_id'] = $id;
        //dd($validated_data, $id, $request->cookie());
        Rating::create($validated_data);

        $name = 'name';
        $value = 'votato';
        $minutes = time()+30*24*60*60;
        $path = '/';
        $cookie = cookie($name,$value,$minutes,$path);
        //dd('ciao ciao');
        return redirect('recensioni')->withCookie($cookie);
        }else{
            $name = 'name';
            $value = 'votato';
            $minutes = time()+30*24*60*60;
            $path = '/';
            $cookie = cookie($name,$value,$minutes,$path);
            //dd('ciao');
            //dd( $request->cookie());
            $user = User::find(1);
            return response()->view('UI.recensioni',compact('user'))->withCookie($cookie);
        }  
    }
}
