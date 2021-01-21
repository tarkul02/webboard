<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [ 
                'name' => 'General', 
                'decision' => 'admin', 
                'status' => 1 
            ], 
            [ 
                'name' => 'Question', 
                'decision' => 'admin',
                'status' => 1 
            ], 
            [ 
                'name' => 'Suggestion', 
                'decision' => 'admin', 
                'status' => 1 
            ],
            [ 
                'name' => 'Issue', 
                'decision' => 'admin', 
                'status' => 1 
            ],
        ]);
    }
}
