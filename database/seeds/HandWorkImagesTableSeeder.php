<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class HandWorkImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hand_work_images')->truncate();
        DB::table('hand_work_images')->insert([
            [
                'hand_work_id' => 1,
                'image' => "https://image.shutterstock.com/image-photo/famous-ancient-wood-carvings-embekke-260nw-69449533.jpg",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'hand_work_id' => 2,
                'image' => "https://previews.123rf.com/images/dnivrab/dnivrab1101/dnivrab110100180/8804893-famous-ancient-wood-carvings-at-embekke-temple-near-kandy-srilanka.jpg",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'hand_work_id' => 3,
                'image' => "https://www.dailynews.lk/sites/default/files/news/2019/06/18/z_p04-Shaping.jpg",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'hand_work_id' => 4,
                'image' => "https://visittangalle.com/wp-content/gallery/pottery-in-tangalle/potter-working-4.jpg",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
