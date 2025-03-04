<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['title','discount'];

    public function products() : BelongsToMany {
        return $this->belongsToMany(Product::class,'promotion_products');
    }

    public static function list() {
        return self::all();
        
    }

    public static function store($request,$id=null){
        $data = $request->only('title','discount');
        $data = self::updateOrCreate(['id'=>$id],$data);
        $data-> products()->sync($request->product_id);
        return $data;
    }
}
