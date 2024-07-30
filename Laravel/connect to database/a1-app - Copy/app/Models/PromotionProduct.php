<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionProduct extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['promotion_id','product_id'];

    public static function list() {
        return self::all();
        
    }

    // public static function store($request,$id=null){
    //     $data = $request->only('title','discount');
    //     $data = self::updateOrCreate(['id'=>$id],$data);
    //     $data-> products()->sync($request->product_id);
    //     return $data;
    // }
}
