<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gamematch_id',
        'user_id',
        'status',
    ];

    public function gamematch()
    {
        return $this->belongsTo(GameMatch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

