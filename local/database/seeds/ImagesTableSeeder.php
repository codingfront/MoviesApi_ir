<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('/data.json');
        $images = json_decode($json, true);
        DB::table('images')->delete();
        foreach ($images as $key=>$image) {
            $record = array(
                'id' => $key+1,
                'mime' => 'image/jpg',
                'name' => $image['imdb_id']."_backdrop.jpg",
                'movie_id' => $image['id'],
                'created_at' => null,
                'updated_at' => null,
                'system_data' => '1'
            );
            \Entities\Image::create($record);
        }
    }
}
