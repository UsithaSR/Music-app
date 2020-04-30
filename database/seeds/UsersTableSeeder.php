<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => "admin",
                'email' => "admin@admin.com",
                'mobile' => "769943467",
                'password' => bcrypt('admin123'), // ranwalaadmin@1qaz
                'address_1' => "address_line_1",
                'address_2' => "address_line_2",
                'gender' => "male",
                'birthday' => "1992-05-01",
                'role' => "admin",
                'language' => "en",
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "usitha",
                'email' => "usitha@gmail.com",
                'mobile' => "769940967",
                'password' => bcrypt('usitha123'),
                'address_1' => "address_line_3",
                'address_2' => "address_line_4",
                'gender' => "male",
                'birthday' => "1995-05-01",
                'role' => "user",
                'language' => "en",
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "ravindu",
                'email' => "ravindu@gmail.com",
                'mobile' => "769921467",
                'password' => bcrypt('ravindu123'),
                'address_1' => "address_line_5",
                'address_2' => "address_line_6",
                'gender' => "male",
                'birthday' => "1997-02-28",
                'role' => "user",
                'language' => "en",
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
