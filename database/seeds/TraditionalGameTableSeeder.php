<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;
class TraditionalGameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('traditional_games')->truncate();
        DB::table('traditional_games')->insert([
            [
                'title_en' => "Pancha Dameema",
                'title_si' => "පංච දමීම",
                'title_ta' => "ஐந்து நடிக்க",
                'image_thumbnail' => "https://i2.wp.com/trip2lanka.com/wp-content/uploads/2014/04/Pancha-Dameema-New-Year-Game.jpg",
                'image' => "https://www.sundayobserver.lk/sites/default/files/news/2017/04/05/z_jun-p06-Pancha-Keliya.jpg",
                'content_en' => "Pancha is played with five small seashells, a coconut shell, and a chart. Players are divided into two groups.",
                'content_si' => "කුඩා මුහුදු පත්ර පහක්, පොල් කටුවක් සහ ප්‍රස්ථාරයක් සමඟ පංච වාදනය කරයි. ක්රීඩකයන් කණ්ඩායම් දෙකකට බෙදා ඇත.",
                'content_ta' => "ஐந்து சிறிய கடற்புலிகள், ஒரு தேங்காய் ஓடு மற்றும் ஒரு விளக்கப்படத்துடன் பஞ்சா விளையாடப்படுகிறது. வீரர்கள் இரண்டு குழுக்களாக பிரிக்கப்பட்டுள்ளனர்",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'title_en' => "Olinda Keliya",
                'title_si' => "ඔලින්ඩා කෙලිය",
                'title_ta' => "ஒலிண்டா கெல்லி",
                'image_thumbnail' => "https://i1.wp.com/ytimg.googleusercontent.com/vi/R40xSiBByzk/mqdefault.jpg",
                'image' => "https://media.timeout.com/images/103235218/630/472/image.jpg",
                'content_en' => "A popular board game usually played by two people, both of whom sit on opposite sides of a wooden board (known as Olinda Kolombuwa or Olinda Poruwa) with about nine holes in it filled with four Olinda seeds each. The game is played by shifting the seeds from one hole to another, while onlookers cheer on. One has to collect the seeds found in the hole immediately. The player who collects the most number of seeds win.",
                'content_si' => "සාමාන්‍යයෙන් දෙදෙනෙකු විසින් ක්‍රීඩා කරනු ලබන ජනප්‍රිය පුවරු ක්‍රීඩාවක් වන අතර දෙදෙනාම ලී පුවරුවක ප්‍රතිවිරුද්ධ පැතිවල වාඩි වී සිටිති (ඔලින්ඩා කොලොම්බුවා හෝ ඔලින්ඩා පෝරුවා ලෙස හැඳින්වේ) එහි සිදුරු නවයක් පමණ ඔලින්ඩා බීජ හතරක් බැගින් පුරවා ඇත. බීජ එක් සිදුරකින් තවත් සිදුරකට මාරු කිරීමෙන් ක්‍රීඩාව සිදු වන අතර, නරඹන්නන් ප්‍රීති ers ෝෂා කරති. කුහරය තුළ ඇති බීජ වහාම එකතු කර ගත යුතුය. වැඩිම බීජ එකතු කරන ක්රීඩකයා ජය ගනී.",
                'content_ta' => "வழக்கமாக இரண்டு பேர் விளையாடும் ஒரு பிரபலமான பலகை விளையாட்டு, இருவரும் மர பலகையின் எதிர் பக்கங்களில் (ஒலிண்டா கொலொம்புவா அல்லது ஒலிண்டா பொருவா என அழைக்கப்படுகிறார்கள்) உட்கார்ந்து அதில் ஒன்பது துளைகளுடன் தலா நான்கு ஒலிண்டா விதைகள் நிரப்பப்படுகின்றன. விதைகளை ஒரு துளையிலிருந்து இன்னொரு துளைக்கு மாற்றுவதன் மூலம் இந்த விளையாட்டு விளையாடப்படுகிறது, அதே நேரத்தில் பார்வையாளர்கள் உற்சாகப்படுத்துகிறார்கள். துளைக்குள் காணப்படும் விதைகளை உடனடியாக சேகரிக்க வேண்டும். அதிக எண்ணிக்கையிலான விதைகளை சேகரிக்கும் வீரர் வெற்றி பெறுவார்.",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),

            ],
            [
                'title_en' => "Kotta Pora",
                'title_si' => "කෝට්ටා පෝර",
                'title_ta' => "கோட்டா ஏழை",
                'image_thumbnail' => "https://news.mountlaviniahotel.com/wp-content/uploads/2011/05/Kotta-Pora-another-event-that-brings-the-best-out-of-you.JPG",
                'image' => "https://i.ytimg.com/vi/PZiXe3J2VFU/maxresdefault.jpg",
                'content_en' => "We Sri Lankans like to go about things in unique ways, and it’s the same for pillow fights. In kotta pora, the two players have to balance themselves on a horizontal bar suspended above the ground with one hand tied behind their backs.",
                'content_si' => "අපි ශ්‍රී ලාංකිකයන් කැමතියි අද්විතීය ආකාරයකින් දේවල් ගැන කතා කරන්න, කොට්ට සටන් සඳහාද එයමයි. කොට්ටා පෝරා වලදී, ක්‍රීඩකයන් දෙදෙනා බිම ඉහලින් අත්හිටවූ තිරස් තීරුවක සමබරව සිටිය යුතුය.",
                'content_ta' => "இலங்கையர்களான நாங்கள் தனித்துவமான வழிகளில் விஷயங்களைப் பற்றிப் பேச விரும்புகிறோம், தலையணை சண்டைகளுக்கும் இதுதான். கோட்டா போராவில், இரு வீரர்களும் தங்களை ஒரு கிடைமட்ட பட்டியில் தரைக்கு மேலே நிறுத்தி வைக்க வேண்டும்.",
                'status' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
