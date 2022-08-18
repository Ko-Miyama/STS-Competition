<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => '自己紹介'
        ]);

        DB::table('categories')->insert([
            'name' => 'フリートーク'
        ]);

        DB::table('categories')->insert([
            'name' => '質問'
        ]);
    }
}
