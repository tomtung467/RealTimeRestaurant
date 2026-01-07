<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{

    //
    use HasFactory;
    protected $fillable = [
        'product_id',
        'option_name',
        'additional_price',
        'description',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
