<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'author',
        'genre',
        'punished_year',
    ];

    public function users(){
        return $this->belongsToMany(User::class,'borrow_records','book_id','user_id');
    }

    public static function BookHasBorrowed(){
        return self::withCount('users')->having('users_count', '>', 0)->get();
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only( 
        'id',
        'title',
        'author',
        'genre',
        'punished_year'
    );
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
