<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'price' => 'decimal:2',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
