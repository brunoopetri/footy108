<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'Gamematches_id',
        'team_id',
        'confirmation_status'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the users associated with the confirmation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function gamematch()
    {
        return $this->belongsTo(GameMatch::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
