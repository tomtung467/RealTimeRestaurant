<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiInteraction extends Model
{
    //
    protected $fillable = [
        'user_message',
        'ai_response',
        'interaction_type',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'interaction_type' => 'string',
    ];
}
