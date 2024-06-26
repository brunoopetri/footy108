<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameMatch extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'location_id',
        'status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the places associated with the Matche.
     */
    public function locations()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * The teams that belong to the Matche.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * The teams that belong to the group.
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    /**
     * Get the invitations for the game match.
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
