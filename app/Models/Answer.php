<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function word()
    {
        return $this->belongsTo('App\Models\Word');
    }
    
    public function lessonWords()
    {
        return $this->hasMany('App\Models\LessonWord');
    }
}
