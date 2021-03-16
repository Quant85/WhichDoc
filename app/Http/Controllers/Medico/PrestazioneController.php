<?php

namespace App\Http\Controllers\Medico;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prestazione;
use Illuminate\Support\Facades\Auth;

class PrestazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestaziones = Prestazione::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Prestazione $prestazione)
    {
        $medico = Auth::user();
        return view('Medico.Prestazioni.create', compact('prestazione', 'medico'));

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
            'nome' => 'required',
            'tipo' => 'required',
            'prezzo' => 'required',
            'descrizione' => 'nullable',
            'disabilità' => 'nullable',

        ]);

        Prestazione::create($validated_data);
        $prestazione = Prestazione::all()->sortBy('name');
        return redirect('Medico.Prestazioni.index',compact('prestazione') );





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestazione = Prestazione::find($id);
        
        return view('Medico.Prestazione.edit', compact('prestazione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestazione $prestazione)
    
    {

        $validated_data = $request->validate([

            'nome' => 'required',
            'tipo' => 'required',
            'prezzo' => 'required',
            'descrizione' => 'nullable',
            'disabilità' => 'nullable',

        ]);
        $prestazione->update($validated_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestazione = Prestazione::find()->delete;

        return redirect()->route('Medico.Prestazioni.index'); 
    }
}
