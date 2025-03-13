<?php

namespace App\Http\Controllers\Home;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use App\Models\TvShow;

class HomeController extends Controller
{
    public function index(){
        $movies = Movie::latest()->get();
        $tvShows = TvShow::latest()->get();

        return view('home', compact(['movies', 'tvShows']));
    }
}
