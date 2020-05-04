<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TraditionalSongsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SongCategoriesTableSeeder::class);
        $this->call(TraditionalSongCategoriesTableSeeder::class);
        $this->call(ProverbsTableSeeder::class);
        $this->call(FrequentlyAskedQuestionTableSeeder::class);
        $this->call(HandWorkCategoriesTableSeeder::class);
        $this->call(HandWorksTableSeeder::class);
        $this->call(HandWorkImagesTableSeeder::class);
        $this->call(KnowledgeHubVideosTableSeeder::class);
        $this->call(KnowledgeHubImagesTableSeeder::class);
        $this->call(KnowledgeHubAudioTableSeeder::class);
        $this->call(TraditionalGameTableSeeder::class);
        $this->call(RiddleTableSeeder::class);
        $this->call(NewCreationTableSeeder::class);
    }
}
