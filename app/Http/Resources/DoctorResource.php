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
        $specializzazione = SpecializationResource::collection($this->Specializzaziones);
        $recensioni = $this->ratings;
        $recensione_voto = $recensioni->where('voto')->pluck('voto');
        $sum =0;
        foreach ($recensione_voto as $value) {
            if (! empty($value)) {
                $sum += $value;
            }
        }
        $length_voti=(count($recensione_voto));

        if (! empty($length_voti)) {
            $media_voti = $sum/$length_voti;
        } else{
            $media_voti = 0;
        }

        if (! empty($recensioni)) {
            $somma_recensioni = count($recensioni);
        } else {
            $somma_recensioni = 0;
        }
        //dd($this->ratings);

        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cognome' => $this->cognome,
            'email' => $this->email,
            'indirizzo' => $this->indirizzo,
            'profilo' => $this->profile, 
            'prestazioni' => PerformanceResource::collection($this->prestaziones),
            'specializzazioni' => $specializzazione,
            'recensioni' => $this->ratings,
            'media_voto' => $media_voti,
            'somma_recensione' => $somma_recensioni,
        ];
    }

    //public $preserveKeys = true;
}
