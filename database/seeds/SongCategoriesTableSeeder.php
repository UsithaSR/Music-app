<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class SongCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('song_categories')->truncate();
        DB::table('song_categories')->insert([
            [
                'title_en' => "Folk Songs",
                'title_si' => "ජන ගී",
                'title_ta' => "நாட்டு பாடல்கள்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "noorthi songs",
                'title_si' => "නූර්ති ගීත",
                'title_ta' => "நூர்த்தி பாடல்கள்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),

            ],
            [
                'title_en' => "nadagam songs",
                'title_si' => "නාඩගම් ගීත",
                'title_ta' => "நாடகம் பாடல்கள்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
