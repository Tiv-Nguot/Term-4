<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','email',"email_verify_at",'password','remember_token'];

    public static function list(){
        return self::all();
    }

    // public static function store($request,$id=null){
    //     $data = $request->only('');
    //     $data = self::UpdateOrCreate(['id'=>$id],$data);
    //     return $data;

    // }
}
