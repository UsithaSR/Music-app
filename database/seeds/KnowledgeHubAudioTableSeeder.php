<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class KnowledgeHubAudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knowledge_hub_audio')->truncate();
        DB::table('knowledge_hub_audio')->insert([
            [
                'title_en' => "audio_1",
                'title_si' => "සිංදුව_1",
                'title_ta' => "பாடல்_1",
                'audio' => "http://topbadu.net/sinhala_mp3/Sahan_Ranwala_Erabaduth_Pipi_Thuru_Matha.mp3",
                'image_thumbnail' => "https://archives.dailynews.lk/2010/07/21/z_Art-page-17-Magnificence03.jpg",
                'content_en' => "content_1",
                'content_si' => "අන්තර්ගතය_1",
                'content_ta' => "ஸ்ரீ காஞ்சி காமகோடி பீடம் உங்களைத் தமிழ்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "audio_2",
                'title_si' => "සිංදුව_2",
                'title_ta' => "பாடல்_2",
                'audio' => "http://topbadu.net/sinhala_mp3/Lional_Ranwala_Me_Aurudu_Kale.mp3",
                'image_thumbnail' => "https://i.ytimg.com/vi/rAK2TtTDMrA/hqdefault.jpg",
                'content_en' => "content_2",
                'content_si' => "අන්තර්ගතය_2",
                'content_ta' => "தொடர்புள்ள விவரங்களின் ஒரு பெட்டகமாகவும்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "audio_3",
                'title_si' => "සිංදුව_3",
                'title_ta' => "பாடல்_3",
                'audio' => "http://topbadu.net/sinhala_mp3/Lional_Ranwala_Kaju_Waare.mp3",
                'image_thumbnail' => "https://live.staticflickr.com/4059/4272739859_376125b98c_z.jpg",
                'content_en' => "content_3",
                'content_si' => "අන්තර්ගතය_3",
                'content_ta' => "உவப்பளிக்கும் நூல்களை இத்தளத்திள் கண்டு",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
