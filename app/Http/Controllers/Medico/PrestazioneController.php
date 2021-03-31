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
        $medico = Auth::user();
        /* $prestazioni = Prestazione::all()->sortBy('name'); */
        return view('Medico.Prestazioni.index', compact('medico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Prestazione $prestazione)
    {
        $medico = Auth::user();
        return view('Medico.Prestazioni.create', compact('medico'));
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
        //dd($validated_data);

        $medico =Auth::user();
        $validated_data['user_id'] = $medico->id;
        //dd($validated_data);

        Prestazione::create($validated_data);
        return redirect('medico/prestazione')->with('success', 'Prestazione saved!');
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
        return view('Medico.Prestazioni.edit', compact('prestazione'));
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
        /* valutare se usare $id con il find($id) */

        $validated_data = $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'prezzo' => 'required',
            'descrizione' => 'nullable',
            'disabilità' => 'nullable',

        ]);
        $prestazione->update($validated_data);
        return redirect('medico/prestazione')->with('success', 'Prestazione modificata!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestazione $prestazione)
    {
        $prestazione->delete();
        return redirect('medico/prestazione')->with('succes', 'Prestazione eliminata!'); 
    }
}
