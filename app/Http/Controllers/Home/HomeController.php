<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
{
    $client = new Client(['verify' => false]);
    $token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E';

    // Fetch Discover Movies
    $discover_response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc', [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'accept' => 'application/json',
        ],
    ]);

    $all_movies = json_decode($discover_response->getBody(), true);

    // ✅ Corrected Filtering Logic
    $movies = array_filter($all_movies['results'], function ($movie) {
        return $movie['title'] !== 'The Ox Road'; // **Return needed here**
    });

    // ✅ Featured Movie Logic
    $featured_movie = collect($all_movies['results'])->random();

    // Fetch Now Playing Movies
    $now_playing_response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?language=en-US&page=1', [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'accept' => 'application/json'
        ]
    ]);

    $now_playing = json_decode($now_playing_response->getBody(), true);

    // ✅ Slice to Get Only 4 Movies
    $now_playing_content = array_slice($now_playing['results'], 0, 4);

    $tv_response = $client->request('GET', 'https://api.themoviedb.org/3/discover/tv?include_adult=false&include_null_first_air_dates=false&language=en-US&page=1&sort_by=popularity.desc', [
        'headers' => [
            'Authorization' => 'Bearer ' . $token,
            'accept' => 'application/json'
        ]
    ]);

    $tvshows = json_decode($tv_response->getBody(), true);


    // Featured Movie Trailer

    $trailer_response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$featured_movie['id']}/videos", [
        'headers' => [
          'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
          'accept' => 'application/json',
        ],
      ]);

    $trailer_response_json = json_decode($trailer_response->getBody(), true);

    $trailers = $trailer_response_json['results'];

    $trailer = $trailers[0];


    $top_rated_response = $client->request('GET', 'https://api.themoviedb.org/3/movie/top_rated?language=en-US&page=1', [
        'headers' => [
          'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
          'accept' => 'application/json',
        ],
    ]);

    $top_rated = json_decode($top_rated_response->getBody(), true);

    $top = $top_rated['results'];

    // UpComing Movies

    $upComing_response = $client->request('GET', 'https://api.themoviedb.org/3/movie/upcoming?language=en-US&page=1', [
        'headers' => [
          'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
          'accept' => 'application/json',
        ],
      ]);

    $upComing = json_decode($upComing_response->getBody(), true);

    $up = $upComing['results'];

    // dump($trailer);

    return view('home', compact(['movies', 'featured_movie', 'now_playing_content', 'tvshows', 'trailer', 'top', 'up']));
}



    public function show($id){
        $client = new Client(['verify' => false]);

        $response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$id}", [
        'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
            'accept' => 'application/json',
        ],
        ]);

        $data = json_decode($response->getBody(), true);

        $certain_res = $client->request('GET', "https://api.themoviedb.org/3/find/{$data['imdb_id']}?external_source=imdb_id", [
            'headers' => [
              'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
              'accept' => 'application/json',
            ],
          ]);


        $movie_details = json_decode($certain_res->getBody(), true);

        $movie = $movie_details['movie_results'];

        $related_response = $client->request('GET', 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
                'accept' => 'application/json',
            ],
        ]);

        $related_response_json = json_decode($related_response->getBody(), true);

        $related_movies = $related_response_json['results'];


        $trailer_response = $client->request('GET', "https://api.themoviedb.org/3/movie/{$id}}/videos", [
            'headers' => [
              'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
              'accept' => 'application/json',
            ],
          ]);

        $trailer_response_json = json_decode($trailer_response->getBody(), true);

        $trailers = $trailer_response_json['results'];

        $trailer = $trailers[0];

        // dump($trailer);

        return view('movies.show', compact(['movie', 'related_movies', 'trailer']));

    }


    public function tv_show($id){

        $client = new Client(['verify' => false]);

         $response = $client->request('GET', "https://api.themoviedb.org/3/tv/{$id}", [
            'headers' => [
              'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjZjI3ZmI3YzIyZWVkMDJlNWNiOGUzMzQwYzIxN2M1OSIsIm5iZiI6MTc0MTg1MDQyMC45NDcsInN1YiI6IjY3ZDI4NzM0NjY4OTJiYWQ2MjgxYTJhZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.KLgZFHCxpgYK2QuUTZ9YUsbb8ufH5HwamIoAmrgLL3E',
              'accept' => 'application/json',
            ],
          ]);

        $tv_shows = json_decode($response->getBody(), true);

        // dump($tv_shows);

        return view('tvshows.show', compact('tv_shows'));
    }
}
