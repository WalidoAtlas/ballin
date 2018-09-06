<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'simplon',
            'email' => 'simplonprod@simplon.co',
            'password' => '$2y$10$Og9Uc3la.qua4BWUkxyO3OkM2ZepoVoFNpYx9D5qJ06qp1K5Qa5ZC',
        ]);
    }
}
