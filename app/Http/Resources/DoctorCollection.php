<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Specializzazione;
use Illuminate\Support\Facades\Auth;

class DoctorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => DoctorResource::collection($this->collection),
            'meta' => ['user_count' => $this->collection->count()],
            'specializzazioni' => request('specializzazione'),
        ];
    }
}
