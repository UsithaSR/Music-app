<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class HandWorkCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hand_work_categories')->truncate();
        DB::table('hand_work_categories')->insert([
            [
                'title_en' => "Wood Cravings",
                'title_si' => "ලී කැටයම්",
                'title_ta' => "மர சிற்பங்கள்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "Pottery",
                'title_si' => "මැටි භාණ්ඩ",
                'title_ta' => "மட்பாண்டங்கள்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),

            ],
            [
                'title_en' => "Category_1",
                'title_si' => "වර්ගය_1",
                'title_ta' => "வகை_1",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
