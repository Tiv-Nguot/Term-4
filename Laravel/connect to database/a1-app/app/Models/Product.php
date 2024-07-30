<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'category_id'];

    // connect the forego key
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
    public static function list()
    {
        return self::all();
    }

    public static function createOrUpdate($request, $id = null)
    {
        $product = $request->only('name', 'description', 'category_id');
        $createOrUpdate = self::updateOrCreate(['id' => $id], $product);
        return $createOrUpdate;
    }
}
