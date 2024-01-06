<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    public function film_organization_roles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FilmOrganizationRole::class);
    }
}
