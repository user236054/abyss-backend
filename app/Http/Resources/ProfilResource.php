<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'pseudo' => $this->user->pseudo,
        'avatar' => $this->avatar,
        'bio' => $this->bio,
        'created_at' => $this->created_at,
        ];
    
    }
}
