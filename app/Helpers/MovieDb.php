<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class MovieDb
{
    // Would be safer to store the API keys in .env file and auto replace in our pipeline process.
    // For this case, it isnt too sensitive, so I just put it into the example env.

    public function __construct()
    {
        $this->api_key = env('API_KEY');

        $config = $this->Config();
        $this->config = $config;
        $this->base_url = $config->images->base_url ?? null;
        $this->secure_base_url = $config->images->secure_base_url ?? "";
    }

    private function Config()
    {
        try {
            $response = Http::get('https://api.themoviedb.org/3/configuration?api_key=' . $this->api_key);
            if (!$response->ok()) {
                return false;
            }

            return $response->object();
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function SearchMovies(string $searchText)
    {
        try {
            $response = Http::get('https://api.themoviedb.org/3/search/movie?api_key=' . $this->api_key . '&language=en-US&page=1&include_adult=false&query=' . urlencode($searchText));

            if (!$response->ok()) {
                return false;
            }

            return $response->object();
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function MovieDetails($movieId)
    {
        try {
            $response = Http::get('https://api.themoviedb.org/3/movie/' . $movieId . '?api_key=' . $this->api_key . '&language=en-US');

            if (!$response->ok()) {
                return false;
            }

            return $response->object();
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function MovieCredits($movieId)
    {
        try {
            $response = Http::get('https://api.themoviedb.org/3/movie/' . $movieId . '/credits?api_key=' . $this->api_key . '&language=en-US');

            if (!$response->ok()) {
                return false;
            }

            return $response->object();
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
