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

    public function producers()
    {
        return $this->belongsToMany(Person::class, 'film_person_roles')
            ->wherePivot('role_id', Role::orWhere('type', 'Coproduttore')->orWhere("type","Produttore")->first()->id);
    }
    public function orgProducers()
    {
        $roleIds = [];
        $roles = Role::orWhere('type', 'Coproduttore')->orWhere("type","Produttore")->get();
        foreach ($roles as $role) {
            $roleIds[] = $role->id;
        }
        return $this->belongsToMany(Organization::class, 'film_organization_roles')
            ->wherePivotIn('role_id', $roleIds);
    }
}
