<?php

namespace App\Http\Controllers;

use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('directors')->get();
        return view('films.index', compact('films'));
    }
    public function show(Film $film)
    {
        $film->load('directors', 'categories','orgProducers','producers');
//        dd($film);
        return view('films.show', compact('film'));

    }

}
