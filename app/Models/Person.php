<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $casts = [
        'birth' => 'date',
        'death' => 'date',
    ];

    public function film_person_roles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FilmPersonRole::class);
    }
}
