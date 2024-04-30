<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GenreMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/data.json');
        $movies = json_decode($json, true);
        DB::table('genre_movie')->delete();
        foreach ($movies as $movie) {
            $movieId = $movie['id'];
            $genres = $movie['genres'];
            foreach ($genres as $genre) {
                $record = array(
                    'movie_id' => $movieId,
                    'genre_id' => $genre,
                    'created_at' => null,
                    'updated_at' => null,
                    'system_data' => '1'
                );
               DB::table('genre_movie')->insertGetId($record);
            }
        }
    }
}
