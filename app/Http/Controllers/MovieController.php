<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::all(),
        ]);
    }

    public function ticketMovie($id)
    {
        $movie = Movie::with('tickets')->find($id);
        return view('movies.ticket', [
            'movie' => $movie,
        ]);
    }

    public function bookMovie($id)
    {
        $movie = Movie::find($id);
        return view('movies.book', [
            'movie' => $movie,
        ]);
    }
}
