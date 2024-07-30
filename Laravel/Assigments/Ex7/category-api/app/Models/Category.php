<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    public static function list(){
        return self::all();
    }
    
    public static function createOrUpdate($request,$id=null){
        $category = $request->only('name','description');
        $data = self::updateOrCreate(['id'=>$id],$category);
        return $data;
    }
}
