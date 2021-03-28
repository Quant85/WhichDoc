<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;

use App\Http\Resources\DoctorResource;
use App\Http\Resources\SpecializationResource;
use App\Http\Resources\DoctorCollection;
use App\Specializzazione;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
        //
        /**
     * Display a listing of the resource.
     *
     * @return 
     */
    public function index(Request $request)
    {    
        return (new DoctorCollection(User::paginate()));
    }
    
    /**
    * Display the specified resource.
    *
    * @param \App\Models\User $doctor
    * @return \Illuminate\Http\JsonResponse
    */
    public function show(User $doctor)
    {
        return (new DoctorResource($doctor));
    }

    /* public function view_doctors()
    {
        return view('UI\advanced_search');
    }

    public function search()
    {

        $doctors = new \App\User();
        
        if (!empty(request('specializzazione'))) {
            $doctors= $doctors->whereHas('specializzaziones',function($query)
            {
                $query->where('descrizione','=',request('specializzazione'));
            } );
        }
    } */

    public function spec()
    {
        $specializzazioni = new \App\Specializzazione();
        $specializzazioni = $specializzazioni->all();
        return response()->json($specializzazioni);
    }
}

