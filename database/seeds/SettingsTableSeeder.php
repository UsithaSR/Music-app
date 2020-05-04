<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            [
                'id' => 1,
                'title' => 'oauth_clients',
                'text' => '[{"name": "android", "secret": "LdIbEDUmQz4J7gCEUGKFiNw2GItLNobEhK9245t6", "version":1, "status":1},{"name": "ios", "secret": "Poa7wON3zdKWLooHFS8844ggGT58J4rf8uQqes9N", "version":1, "status":1},{"name": "web", "secret": "NxPgxjyDqcnGLjMvyUOMvoMOZeuQR59RuXcDVyzP", "version":1, "status":1}]',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'title' => 'app_settings',
                'text' => '{"android": {"new_version": "1.0.0","update_required": 0},"ios": {"new_version": "1.0.0","update_required": 0}}',
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
