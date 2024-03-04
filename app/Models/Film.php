<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    protected $casts = [
        'release' => 'date'
    ];

    public function film_person_roles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FilmPersonRole::class);
    }

    public function film_organization_roles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FilmOrganizationRole::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function directors()
    {
        return $this->belongsToMany(Person::class, 'film_person_roles')
            ->wherePivot('role_id', Role::where('type', 'Regista')->first()->id);
    }
}
