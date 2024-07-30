<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // public function toArray(Request $request): array
    // {
    //     return $this->only('id','name');
    // }
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'total_products' => $this->products -> count(),
            'products' => $this->products->pluck('name','id')
        ];
    }
}
