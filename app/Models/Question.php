<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer');
    }

    // exam_answers
}
