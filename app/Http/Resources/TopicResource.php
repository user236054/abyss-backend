<?php

namespace App\Http\Resources;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        //A enlever quand je serais en prod afin d'eviter d'eventuel rsique de piratage
        'id' => $this->id,
        'title' => $this->title,
        'content' => $this->content,
        'user' => $this->user->pseudo,
        'created_at' => $this->created_at,
        'watch_topic' => $this->watch_topic,
        ];
    }
}
