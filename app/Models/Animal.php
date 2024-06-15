<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'race',
        'age',
        'sex'
        ];

    // Definir la relación belongsTo con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}