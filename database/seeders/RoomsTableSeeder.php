<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [ 
                'name' => 'General', 
                'decision' => 'admin', 
                'status' => 1 
            ], 
            [ 
                'name' => 'Desktop Wallet', 
                'decision' => 'admin',
                'status' => 1 
            ], 
            [ 
                'name' => 'Mobile Wallet', 
                'decision' => 'admin', 
                'status' => 1 
            ],
            [ 
                'name' => 'Web wallet', 
                'decision' => 'admin', 
                'status' => 1 
            ],
            [ 
                'name' => 'Smart Contract', 
                'decision' => 'admin', 
                'status' => 1 
            ],
            [ 
                'name' => 'DApp', 
                'decision' => 'admin', 
                'status' => 1 
            ],
            [ 
                'name' => 'Oracle', 
                'decision' => 'admin', 
                'status' => 1 
            ],
            [ 
                'name' => 'Defi', 
                'decision' => 'admin', 
                'status' => 1 
            ],
        ]);
    }
}
