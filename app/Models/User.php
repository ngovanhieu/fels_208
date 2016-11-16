<?php

namespace App\Models;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function activities()
    {
        return $this->hasMany('App\Models\Activity');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    public function followers()
    {
        return $this->hasMany('App\Models\Relationship', 'follower_id');
    }
    
    public function followings()
    {
        return $this->hasMany('App\Models\Relationship', 'following_id');
    }

    public function socials()
    {
        return $this->hasMany('App\Models\Social');
    }

    public function isAdmin()
    {
        return $this->role == config('user.role-default.admin');
    }

    public function isCurrent()
    {
        return auth()->check() && auth()->id() == $this->id;
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? config('user.avatar.upload_path') . $this->id . '/' . $this->avatar : null;
    }

    public function isSuperAdmin()
    {
        return $this->role == config('user.role-default.super-admin');
    }

    public function isMember()
    {
        return $this->role == config('user.role-default.member');
    }
}
