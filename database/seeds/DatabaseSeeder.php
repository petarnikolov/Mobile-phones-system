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
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),]);

        $timestamp = mt_rand(1, time());
        $createddate = date('Y-m-d', time());
        $randomDate = date("Y-m-d", $timestamp);
        DB::table('phones')->insert([
            'name' => str_random(10),
            'releaseDate' => $randomDate,
            'created_at' => $createddate,
            'updated_at' => $createddate,
            'filename' => str_random(20)]);
        DB::table('manufacturers')->insert([
            'name' => str_random(10),
        ]);

    }
}
