<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Orders\Status;

class Order extends Model
{
    //
    protected $fillable = [
        'table_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts = [
        'status' => Status::class,
    ];
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
