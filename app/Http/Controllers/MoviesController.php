<?php

namespace App\Http\Controllers;

use App\Helpers\MovieDb;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;

class MoviesController extends Controller
{
    public function index()
    {
        $mdb = new MovieDb();
        $movie = self::__movieDetails($mdb->PopularMovie()->id);
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'error' => '',
            'apiKey' => env('API_KEY') != "" && env('API_KEY') ? true : false,
            'popularMovie' => $movie
        ]);
    }

    public function SearchMovie(Request $request)
    {
        $request->validate([
            'search' => 'min:1|required'
        ]);

        $mdb = new MovieDb();
        $response = $mdb->SearchMovies($request->search);

        if (!isset($response->results[0])) {
            return Inertia::render('Welcome', [
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
                'error' => 'Sorry, we could not find the movie. Please enter a new name.',
                'apiKey' => env('API_KEY') != "" && env('API_KEY') ? true : false,
            ]);
        }

        $movie = self::__movieDetails($response->results[0]->id);
        return Inertia::render('MovieDetails', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'movie' => $movie,
            'apiKey' => env('API_KEY') != "" && env('API_KEY') ? true : false,

        ]);
    }

    private function __movieDetails($movieId)
    {
        $mdb = new MovieDb();
        $movie = $mdb->MovieDetails($movieId);
        $movie->base_url = $mdb->base_url;
        $movie->secure_base_url = $mdb->secure_base_url;
        $movie->runtime = self::__hoursandmins($movie->runtime, '%02dh %02dm');

        $movie->release_year = explode("-", $movie->release_date)[0];
        $movie->release_date = Carbon::parse($movie->release_date)->format('m/d/Y');

        $movie->cast = array_slice($mdb->MovieCredits($movieId)->cast, 0, 10);

        $movie->stars = $movie->vote_average / 2;

        return $movie;
    }

    private function __hoursandmins($time, $format = '%02d:%02d')
    {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }
}
