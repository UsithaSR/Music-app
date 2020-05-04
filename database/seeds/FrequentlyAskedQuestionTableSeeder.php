<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class FrequentlyAskedQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frequently_asked_questions')->truncate();
        DB::table('frequently_asked_questions')->insert([
            [
                'title_en' => "Question_1",
                'title_si' => "ප්‍රශ්නය_1",
                'title_ta' => "கேள்வி_1",
                'content_en' => "Absence makes the heart grow fonder",
                'content_si' => "නොපැවතීම හදවත ප්‍රිය කරයි",
                'content_ta' => "கேள்வி",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "Question_2",
                'title_si' => "ප්‍රශ්නය_2",
                'title_ta' => "கேள்வி_2",
                'content_en' => "Actions speak louder than words.",
                'content_si' => "ක්‍රියාව වචනවලට වඩා හයියෙන් කතා කරයි.",
                'content_ta' => "செயல்கள் சொற்களை விட சத்தமாக பேசுகின்றன.",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),

            ],
            [
                'title_en' => "Question_3",
                'title_si' => "ප්‍රශ්නය_3",
                'title_ta' => "கேள்வி_3",
                'content_en' => "A journey of a thousand miles begins with a single step",
                'content_si' => "සැතපුම් දහසක ගමනක් ආරම්භ වන්නේ තනි පියවරකින්",
                'content_ta' => "ஆயிரம் மைல் பயணம் ஒரு படி மூலம் தொடங்குகிறது",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }

}
