<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }
}

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123123123'),
        ]);
    }
}
