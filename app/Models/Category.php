<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    //use Translatable;

    //public $translatedAttributes = ['name', 'description'];

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }
}
