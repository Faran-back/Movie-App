<?php

namespace App\Http\Controllers\TvShows;

use App\Http\Controllers\Controller;
use App\Models\TvShow;
use Illuminate\Http\Request;

class TvShowController extends Controller
{
    public function index(){
        $tvshows = TvShow::all();
        return view('tvshows.index', compact('tvshows'));
    }

    public function edit($id){
        $tvshow = TvShow::findOrFail($id);
        return view('tvshows.edit', compact('tvshow'));
    }

    public function create(){
        return view('tvshows.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'genre' => 'required',
            'cover_photo' => 'required'
        ]);

        TvShow::create($data);

        return redirect()->route('movies')->with('success', 'TvShow added successfully');
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'genre' => 'required',
            'cover_photo' => 'required'
        ]);

        $tvShow = TvShow::findOrFail($id);
        $tvShow->update($data);

        return redirect()->route('movies')->with('success', 'TvShow updated successfully');
    }

    public function destroy($id){
        $tvShow = TvShow::findOrFail($id);
        $tvShow->delete();

        return redirect()->route('movies')->with('success', 'Movie deleted successfully');
    }
}


