<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,

            // 'user'=>$this->user,

            // 'user' => [
            //     'id' => $this->user->id,
            //     'name' => $this->user->name,
            //     'email' => $this->user->email,
            // ],

            'user' => new UserResource($this->whenLoaded('user'))
            // whenLoaded() method is used to work with eager loading with user table
            // Example Post::with('user:id,name,email')->get() or Post::with('user:id,name,email')->paginate(10)

        ];
    }
}
