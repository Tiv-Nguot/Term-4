<?php
//1. student in model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','age','province'];

    public static function list(){
        $data= self::all();
        return $data;
    }

    public static function store($request,$id=null){
        $data = $request->only('name','age','province');
        $student = self::updateOrCreate(['id'=>$id],$data);
        return $student;

    }
}
