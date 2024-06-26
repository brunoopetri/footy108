<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;


class User extends Model
{
    //use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use HasFactory, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Get the system roles associated with the user.
     */
    public function systemroles()
    {
        return $this->belongsToMany(SystemRole::class);
    }

    /**
     * Get the phone records associated with the user.
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    /**
     * The groups that the user belongs to.
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     * Get the confirmation associated with the user.
     */
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }

    /**
     * Get the invitations sent to the user.
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
