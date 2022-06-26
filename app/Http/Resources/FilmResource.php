<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap = 'film';
    public function toArray($request)
    {
        return [
            'naslov'=> $this -> resource->naslov,
            'produkcija'=> $this -> resource->produkcija,
            'godina_premijere' => $this -> resource->godina_premijere,
            'reziser_id'=> new ReziserResource($this -> resource->reziser),
             'zanr_id'=>new ZanrResource($this -> resource->zanr),
             'user_id'=>new UserResource($this -> resource->user)
  
          ];
    }
}
