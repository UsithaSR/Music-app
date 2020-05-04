<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class HandWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hand_works')->truncate();
        DB::table('hand_works')->insert([
            [
                'hand_work_category_id' => 1,
                'title_en' => "Masks",
                'title_si' => "වෙස් මුහුණු",
                'title_ta' => "முகமூடிகள்",
                'content_en' => "content_1",
                'content_si' => "අන්තර්ගතය_1",
                'content_ta' => "ஸ்ரீ காஞ்சி காமகோடி பீடம் உங்களைத் தமிழ்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'hand_work_category_id' => 1,
                'title_en' => "Architecture",
                'title_si' => "නිර්මාණ ශිල්පය",
                'title_ta' => "கட்டிடக்கலை",
                'content_en' => "content_2",
                'content_si' => "අන්තර්ගතය_2",
                'content_ta' => "தொடர்புள்ள விவரங்களின் ஒரு பெட்டகமாகவும்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),

            ],
            [
                'hand_work_category_id' => 2,
                'title_en' => "Cooking Pots",
                'title_si' => "ඉවුම් පිහුම් භාජන",
                'title_ta' => "சமையல் பானைகள்",
                'content_en' => "content_3",
                'content_si' => "අන්තර්ගතය_3",
                'content_ta' => "உவப்பளிக்கும் நூல்களை இத்தளத்திள் கண்டு",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'hand_work_category_id' => 2,
                'title_en' => "Vase",
                'title_si' => "බඳුන",
                'title_ta' => "குவளை",
                'content_en' => "content_4",
                'content_si' => "අන්තර්ගතය_4",
                'content_ta' => "ஸ்ரீ காஞ்சி காமகோடி பீடம் உங்களைத் தமிழ்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
