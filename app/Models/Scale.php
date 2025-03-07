<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scale extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'value', 'points', 'created_at', 'updated_at'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
