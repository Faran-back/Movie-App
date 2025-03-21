<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){

        $client = new Client(['verify' => false]);

        $token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E';

        $discover_response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc', [
            'headers' => [
              'Authorization' => 'Bearer ' . $token,
              'accept' => 'application/json',
            ],
          ]);

        $movies = json_decode($discover_response->getBody(), true);

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

               return redirect()->route('movies')->with('success', 'Movie Added Successfully');
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


