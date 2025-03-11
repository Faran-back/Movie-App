<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function edit(){
        $movies = Movie::all();
        return view('movies.edit', compact('movies'));
    }

    public function create(){
        return view('movies.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'genre' => 'required',
            'cover_photo' => 'required'
        ]);

        Movie::create($data);

        return redirect()->route('movies')->with('success', 'Movie added successfully');
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'genre' => 'required',
            'cover_photo' => 'required'
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($data);

        return redirect()->route('movies')->with('success', 'Movie updated successfully');
    }

    public function destroy($id){
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies')->with('success', 'Movie deleted successfully');
    }
}


