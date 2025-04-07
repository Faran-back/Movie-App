<?php

namespace App\Http\Controllers\Movies;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

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

    public function show($id){

        $access_key = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E';

        $client = new Client(['verify' => false]);

        $response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$id}", [
            'headers' => [
                'Authorization' => 'Bearer '. $access_key,
                'accept' => 'application/json'
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        $certain_res = $client->request('GET', "https://api.themoviedb.org/3/find/{$data['imdb_id']}?external_source=imdb_id", [
            'headers' => [
              'Authorization' => 'Bearer ' . $access_key,
              'accept' => 'application/json',
            ],
          ]);

        $movies = json_decode($certain_res->getBody(), true);

        $movie = $movies['movie_results'];

        // Related Movies

        $related_response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
                'accept' => 'application/json',
            ],
        ]);

        $related_response_json = json_decode($related_response->getBody(), true);

        $related_movies = $related_response_json['results'];


        $trailer_response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$id}/videos", [
            'headers' => [
              'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
              'accept' => 'application/json',
            ],
          ]);

        $trailer_response_json = json_decode($trailer_response->getBody(), true);

        $trailers = $trailer_response_json['results'];

        $trailer = $trailers[0];


        return view('movies.show', compact(['movie', 'related_movies', 'trailer']));
    }
}


