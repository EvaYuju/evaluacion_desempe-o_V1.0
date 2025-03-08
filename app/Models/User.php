<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'nif', 'sex', 'center_id', 'role', 'created_at', 'updated_at'];
        //'password',          // Agregado para asignación masiva
        //'email_verified_at', // Agregado si necesitas almacenar esta información

         // Campos que se ocultan en las respuestas JSON o arrays.
    
         /*protected $hidden = [
        'password',
        'remember_token',
         ];*/
    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function surveys()
    {
        return $this->belongsToMany(Survey::class, 'survey_users');
    }
}
