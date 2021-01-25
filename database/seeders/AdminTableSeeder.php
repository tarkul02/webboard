<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            [ 
                'name' => 'admin', 
                'email' => 'admin', 
                'password' => '$2y$10$bpmzFO.8nkRh9PbgKYWn2.4eKxk1/agpiHfra5YrtKGwRwrgwZhDK' 
            ], 
        ]);
    }
}
