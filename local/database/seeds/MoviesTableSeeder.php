<?php

use Entities\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->delete();
        $json = Storage::disk('local')->get('/data.json');
        $movies = json_decode($json, true);

        foreach($movies as $movie){
            Movie::query()->updateOrCreate([
                'id' => $movie['id'],
                'ratings' => json_encode($movie['ratings']),
                'title' => $movie['title'],
                'rated' => $movie['rated'],
                'year' => $movie['year'],
                'released' => $movie['released'],
                'runtime' => $movie['runtime'],
                'director' => $movie['director'],
                'writer' => $movie['writer'],
                'actors' => $movie['actors'],
                'plot' => $movie['plot'],
                'language' => $movie['language'],
                'country' => $movie['country'],
                'awards' => $movie['awards'],
                'poster' => $movie['poster'],
                'metascore' => $movie['metascore'],
                'imdb_rating' => $movie['imdb_rating'],
                'imdb_votes' => $movie['imdb_votes'],
                'imdb_id' => $movie['imdb_id'],
                'type' => $movie['type'],
                'dvd' => $movie['dvd'],
                'box_office' => $movie['box_office'],
                'production' => $movie['production'],
                'website' => $movie['website'],
                'response' => $movie['response'],
                'system_data' => $movie['system_data'],
             
            ]);
        }
    }
}
