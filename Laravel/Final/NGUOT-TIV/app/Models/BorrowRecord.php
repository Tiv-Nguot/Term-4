<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
    // show book and user who borrow book by date
    
    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only(
            'id',
            'user_id',
            'book_id',
            'borrow_date',
            'return_date',
        );
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
