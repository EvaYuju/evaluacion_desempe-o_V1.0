<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['answer_id', 'created_at', 'updated_at'];

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

}
