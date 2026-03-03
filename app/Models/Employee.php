<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'position',
        'department_id',
    ];
    protected $hidden = [
        'created_at',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
