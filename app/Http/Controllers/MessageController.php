<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$messages = Message::all();
        /* $medico = Auth::user();
        Carbon::setLocale('it');
        return view('Message.index', compact('medico')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Lo utiliziamo per reindirizzare alla modale/page di verifia invio messaggio con i dati ricapitolati del messaggio
        $medico = Auth::user();
        return view('Message.modaleMessaggio', compact('medico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated_data = $request->validate([
            'user_id' => 'user_id',
            'nome_paziente' => 'required',
            'testo_messaggio' => 'required',
            'email' => 'required',
            'cellulare' => 'nullable',
            'disabilità' => 'nullable',
        ]);
        $medico =Auth::user();
        $validated_data['user_id'] = $medico->id;
        //dd($validated_data);

        Message::create($validated_data);
        return redirect('message/create')->with('success', 'Messaggio inviato!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($message)
    {
        $message = Message::find($message);
        return view('Messaggio.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
