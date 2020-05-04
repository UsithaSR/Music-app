<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
class RiddleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('riddles')->truncate();
        DB::table('riddles')->insert([
            [
                'title_en' => "NO APPLAUSE",
                'title_si' => "ප්‍රහේලිකාව",
                'title_ta' => "ஐந்து நடிக்க",
                'image_thumbnail' => "https://i.ytimg.com/vi/hiloy6jc9PM/hqdefault.jpg",
                'content_en' => "What has hands but can not clap?",
                'content_si' => "අත් ඇති නමුත් අත්පුඩි ගැසීමට නොහැකි කුමක්ද?",
                'content_ta' => "என்ன கைகள் உள்ளன, ஆனால் கைதட்ட முடியாது?",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "BUD",
                'title_si' => "අංකුරය",
                'title_ta' => "மொட்டு",
                'image_thumbnail' => "https://i.ytimg.com/vi/_UcdpF6B_zk/hqdefault.jpg",
                'content_en' => "What tastes better than it smells?",
                'content_si' => "සුවඳට වඩා රස මොනවාද?",
                'content_ta' => "வாசனை விட சுவை எது?",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),

            ],
            [
                'title_en' => "TRAMP",
                'title_si' => "ට්‍රම්ප්",
                'title_ta' => "நாடோடி",
                'image_thumbnail' => "https://i.ytimg.com/vi/qQAfP1UdtJY/hqdefault.jpg",
                'content_en' => "What goes through cities and fields, but never moves?",
                'content_si' => "නගර සහ කෙත්වතු හරහා ගියත් කිසි විටෙකත් චලනය නොවන්නේ කුමක්ද?",
                'content_ta' => "நகரங்கள் மற்றும் துறைகள் வழியாக என்ன செல்கிறது, ஆனால் ஒருபோதும் நகராது?",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
