<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilisateurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this);
        $values =  parent::toArray($request);
        $values["created_at"]= date_format(date_create($values["created_at"]),"d-m-Y");
        $values["updated_at"]= date_format(date_create($values["updated_at"]),"d-m-Y");
        if ($values["deleted_at"] !== null){
            $values["deleted_at"]= date_format(date_create($values["deleted_at"]),"d-m-Y");
        }
        // dd(url("/public/storage"));
        unset($values["password"]);
        return $values;
    }
}
