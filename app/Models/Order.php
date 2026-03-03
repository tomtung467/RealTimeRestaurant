<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'table_id',
        'employee_id',
        'total_price',
        'status',
    ];
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
