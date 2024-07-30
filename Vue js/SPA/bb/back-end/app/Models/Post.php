<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','body'];

    // public static function list(){
    //     return Post::all();
    // }

    // public static function store($request,$id=null)  {
    //     $post = $request->only('title','body');
    //     $post = self::updateOrCreate(['id'=>$id],$post);
    //     return $post;
        
    // }
}
