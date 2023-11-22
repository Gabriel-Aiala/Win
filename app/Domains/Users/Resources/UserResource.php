<?php

namespace App\Domains\Users\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'whatsapp' => $this->whatsapp,
            'avatar' => $this->avatar,
            'investidor_type_id' => $this->investidor_type_id,
            'sport_id' => $this->sport_id,
        ];
    }
}