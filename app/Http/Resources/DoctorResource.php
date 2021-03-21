<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'email' => $this->email,
            'indirizzo' => $this->indirizzo,
            'profilo' => $this->profile,
            'prestazioni' => PerformanceResource::collection($this->prestaziones),
            'specializzazioni' => $this->Specializzaziones,
            'recensioni' => $this->ratings,
        ];
    }

    //public $preserveKeys = true;
}
