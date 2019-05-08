<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Create fake users and profiles.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 50)->create()->each(function ($user) {
            $user->profile()->save(factory(\App\Profile::class)->make());
        });
    }
}
