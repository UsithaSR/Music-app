<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class KnowledgeHubVideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knowledge_hub_videos')->truncate();
        DB::table('knowledge_hub_videos')->insert([
            [
                'title_en' => "video_1",
                'title_si' => "සිංදුව_1",
                'title_ta' => "பாடல்_1",
                'video' => "https://www.youtube.com/watch?v=ngowPwmo1-o",
                'video_thumbnail' => "https://archives.dailynews.lk/2010/07/21/z_Art-page-17-Magnificence03.jpg",
                'content_en' => "content_1",
                'content_si' => "අන්තර්ගතය_1",
                'content_ta' => "ஸ்ரீ காஞ்சி காமகோடி பீடம் உங்களைத் தமிழ்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_2",
                'title_si' => "සිංදුව_2",
                'title_ta' => "பாடல்_2",
                'video' => "https://www.youtube.com/watch?v=Gf350u7GsKs",
                'video_thumbnail' => "https://i.ytimg.com/vi/rAK2TtTDMrA/hqdefault.jpg",
                'content_en' => "content_2",
                'content_si' => "අන්තර්ගතය_2",
                'content_ta' => "தொடர்புள்ள விவரங்களின் ஒரு பெட்டகமாகவும்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_3",
                'title_si' => "සිංදුව_3",
                'title_ta' => "பாடல்_3",
                'video' => "https://www.youtube.com/watch?v=_UX2tFGWvPU",
                'video_thumbnail' => "https://live.staticflickr.com/4059/4272739859_376125b98c_z.jpg",
                'content_en' => "content_3",
                'content_si' => "අන්තර්ගතය_3",
                'content_ta' => "உவப்பளிக்கும் நூல்களை இத்தளத்திள் கண்டு",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_4",
                'title_si' => "සිංදුව_4",
                'title_ta' => "பாடல்_4",
                'video' => "https://www.youtube.com/watch?v=ngowPwmo1-o",
                'video_thumbnail' => "https://archives.dailynews.lk/2010/07/21/z_Art-page-17-Magnificence03.jpg",
                'content_en' => "content_4",
                'content_si' => "අන්තර්ගතය_4",
                'content_ta' => "ஸ்ரீ காஞ்சி காமகோடி பீடம் உங்களைத் தமிழ்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_5",
                'title_si' => "සිංදුව_5",
                'title_ta' => "பாடல்_5",
                'video' => "https://www.youtube.com/watch?v=Gf350u7GsKs",
                'video_thumbnail' => "https://i.ytimg.com/vi/rAK2TtTDMrA/hqdefault.jpg",
                'content_en' => "content_5",
                'content_si' => "අන්තර්ගතය_5",
                'content_ta' => "தொடர்புள்ள விவரங்களின் ஒரு பெட்டகமாகவும்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_6",
                'title_si' => "සිංදුව_6",
                'title_ta' => "பாடல்_6",
                'video' => "https://www.youtube.com/watch?v=_UX2tFGWvPU",
                'video_thumbnail' => "https://live.staticflickr.com/4059/4272739859_376125b98c_z.jpg",
                'content_en' => "content_6",
                'content_si' => "අන්තර්ගතය_6",
                'content_ta' => "உவப்பளிக்கும் நூல்களை இத்தளத்திள் கண்டு",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_7",
                'title_si' => "සිංදුව_7",
                'title_ta' => "பாடல்_7",
                'video' => "https://www.youtube.com/watch?v=ngowPwmo1-o",
                'video_thumbnail' => "https://archives.dailynews.lk/2010/07/21/z_Art-page-17-Magnificence03.jpg",
                'content_en' => "content_7",
                'content_si' => "අන්තර්ගතය_7",
                'content_ta' => "ஸ்ரீ காஞ்சி காமகோடி பீடம் உங்களைத் தமிழ்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_8",
                'title_si' => "සිංදුව_8",
                'title_ta' => "பாடல்_8",
                'video' => "https://www.youtube.com/watch?v=Gf350u7GsKs",
                'video_thumbnail' => "https://i.ytimg.com/vi/rAK2TtTDMrA/hqdefault.jpg",
                'content_en' => "content_8",
                'content_si' => "අන්තර්ගතය_8",
                'content_ta' => "தொடர்புள்ள விவரங்களின் ஒரு பெட்டகமாகவும்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "video_8",
                'title_si' => "සිංදුව_8",
                'title_ta' => "பாடல்_8",
                'video' => "https://www.youtube.com/watch?v=_UX2tFGWvPU",
                'video_thumbnail' => "https://live.staticflickr.com/4059/4272739859_376125b98c_z.jpg",
                'content_en' => "content_8",
                'content_si' => "අන්තර්ගතය_8",
                'content_ta' => "உவப்பளிக்கும் நூல்களை இத்தளத்திள் கண்டு",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }

}
