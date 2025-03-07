<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'question', 'category_id', 'scale_id', 'created_at', 'updated_at'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
