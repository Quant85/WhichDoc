<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

use App\Http\Resources\DoctorResource;

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
        $specializzazioni = Specializzazione::all();
        $doctor = User::all();
        

        $newCollectio = new DoctorCollection(User::paginate());
        return ($newCollectio);
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
}
