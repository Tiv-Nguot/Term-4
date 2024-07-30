<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
    ];
    public function books(){
        return $this->belongsToMany(Book::class,'borrow_records','book_id','user_id');
    }

    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('name', 'email');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
