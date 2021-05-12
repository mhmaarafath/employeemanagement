<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'M H M Arafath',
            'email' => 'mhmaarafath@gmail.com',
            'password' => Hash::make('Marafath1'),
            'role' => 'admin'
        ]);

    }
}
