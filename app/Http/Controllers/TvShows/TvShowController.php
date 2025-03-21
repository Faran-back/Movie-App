<?php

namespace App\Http\Controllers\TvShows;

use App\Http\Controllers\Controller;
use App\Models\TvShow;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TvShowController extends Controller
{
    public function index(){
        $client = new Client(['verify' => false]);
        $token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E';

        $response = $client->request('GET', 'https://api.themoviedb.org/3/discover/tv?include_adult=false&include_null_first_air_dates=false&language=en-US&page=1&sort_by=popularity.desc', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'accept' => 'application/json'
            ]
        ]);

        $tvshows = json_decode($response->getBody(), true);

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


