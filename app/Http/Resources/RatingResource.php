<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
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
            'user_id' => $this->user_id,
            'nome_utente' => $this->nome_utente,
            'body' => $this->body,
            'voto' => $this->voto,
            'data' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
