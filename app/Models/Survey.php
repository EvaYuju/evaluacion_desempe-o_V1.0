<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'survey_users');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
