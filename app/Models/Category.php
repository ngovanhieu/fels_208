<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
    
    public function words()
    {
        return $this->hasMany('App\Models\Word');
    }
}
