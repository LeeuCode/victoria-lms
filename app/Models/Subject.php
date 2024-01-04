<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'price', 'duration'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function question()
    {
        return $this->hasMany('App\Models\Question');
    }

    // public function question($id)
    // {
    //     return $this->hasMany('App\Models\Question')
    //     ->leftJoin('exam_answers','exam_answers.question_id','=','questions.id')
    //     ->where('exam_answers.exam_id', $id);
    // }
}
