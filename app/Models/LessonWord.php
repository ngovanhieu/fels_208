<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonWord extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }

    public function word()
    {
        return $this->belongsTo('App\Models\Word');
    }
    
    public function answer()
    {
        return $this->belongsTo('App\Models\Answer');
    }
}
