<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
class Center extends Model
{
    use HasFactory;

    protected $fillable = ['denomination', 'province', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
