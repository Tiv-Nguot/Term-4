<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    
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
