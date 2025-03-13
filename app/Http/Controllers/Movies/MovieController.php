<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function edit($id){
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }

    public function create(){
        return view('movies.create');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'rating' => 'required',
                'genre' => 'required',
                'cover_photo' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);


            if ($request->hasFile('cover_photo')) {
                $file = $request->file('cover_photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('movies', $filename, 'public');

                $movie = Movie::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'rating' => $request->rating,
                    'genre' => $request->genre,
                    'cover_photo' => $filename
                ]);

                return response()->json([
                    'status' => '200',
                    'success' => 'Movie added successfully',
                    'movie' => $movie,
                    'redirect_url' => route('movies')
                ]);
            }

            return response()->json([
                'status' => '400',
                'error' => 'Cover photo is required'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => '500',
                'error' => $e->getMessage()
            ]);
        }
    }


    public function update(Request $request, $id){

        try{

        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'genre' => 'required',
            'cover_photo' => 'required|file|image|mimes:png,jpg,jpeg,gif,svg|max:2048'
        ]);

        $movie = Movie::findOrFail($id);

        if($request->has('cover_photo')){
            $file = $request->cover_photo;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('movies', $filename, 'public');


        $movie->update([
            'title' => $request->title,
            'description' => $request->description,
            'rating' => $request->rating,
            'genre' => $request->genre,
            'cover_photo' => $filename
        ]);

        return redirect()->route('movies')->with('success', 'Movie updated successfully');

    }

    }catch(Exception $e){
        return response()->json([
            'status' => 500,
            'message' => $e->getMessage()
        ]);
    }

    }

    public function destroy($id){
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies')->with('success', 'Movie deleted successfully');
    }
}


