<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'email'=> $this->email,
            // 'books'=> $this->books,
            'total_books'=> $this->books->count(),
            'books'=> BookResource::collection($this->books)->pluck('title')->toArray()
        ];
    }
}
