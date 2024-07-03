<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The users that belong to the group.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The teams that belong to the game.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * The positions that belong to the group.
     */
    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    /**
     * The teams that belong to the game.
     */
    public function gamematches()
    {
        return $this->belongsToMany(GameMatch::class);
    }
}
