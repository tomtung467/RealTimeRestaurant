<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Table\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    //
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'table_number',
        'qr_code_token',
        'status',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts = [
        'status' => Status::class,
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
