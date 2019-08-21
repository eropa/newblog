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
        DB::table('users')->insert([
            'name' =>'admin',
            'email' => 'admin@admin.local',
            'password' => bcrypt('123123'),
        ]);

        DB::table('optionsaits')->insert([
            'name' =>'countnew',
            'value' => '10',
        ]);
    }
}
