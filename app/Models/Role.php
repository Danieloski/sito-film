<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function film_person_roles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FilmPersonRole::class);
    }

    public function film_organization_roles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FilmOrganizationRole::class);
    }
}
