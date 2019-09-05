<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\Models\User::create([
        	'name' => 'ale',
        	'email' =>'ale@gmail.com',
        	'password' => bcrypt('1868'),
        ]);
    }
}
