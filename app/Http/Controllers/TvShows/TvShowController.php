<?php

namespace App\Http\Controllers\TvShows;

use App\Http\Controllers\Controller;
use App\Models\TvShow;
use Exception;
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

        try{

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'rating' => 'required',
                'genre' => 'required',
                'cover_photo' => 'required'
            ]);

            if($request->hasFile('cover_photo')){

                $file = $request->cover_photo;
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('movies', $filename, 'public');

                TvShow::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'rating' => $request->rating,
                    'genre' => $request->genre,
                    'cover_photo' => $filename
                ]);

                return redirect()->route('movies')->with('success', 'TvShow added successfully');

            }

        }catch(Exception $error){
            return response()->json([
                'status' => 500,
                'message' => $error->getMessage(),
            ]);
        }

    }

    public function update(Request $request, $id){

        try{

            $tvShow = TvShow::findOrFail($id);

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'rating' => 'required',
                'genre' => 'required',
                'cover_photo' => 'required'
            ]);

            if($request->hasFile('cover_photo')){
                $file = $request->cover_photo;
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('tvshows', $filename, 'public');

                $tvShow->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'rating' => $request->rating,
                    'genre' => $request->genre,
                    'cover_photo' => $filename
                ]);

                return redirect()->route('tv.shows')->with('success', 'TvShow updated successfully');
            }

        }catch(Exception $error){
            return response()->json([
                'status' => 500,
                'message' => $error->getMessage(),
            ]);
        }

    }

    public function destroy($id){
        $tvShow = TvShow::findOrFail($id);
        $tvShow->delete();

        return redirect()->route('tv.shows')->with('success', 'TvShow deleted successfully');
    }
}


