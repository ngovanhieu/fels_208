<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relationship extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function follower()
    {
        return $this->belongsTo('App\Models\User','follower_id');
    }
    
    public function following()
    {
       return $this->belongsTo('App\Models\User','following_id');
    }
}
