<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Honda',
            'slug' => 'honda',
            'description' => 'this is description',
            'content' => 'this is content'
        ]);
    }
}
