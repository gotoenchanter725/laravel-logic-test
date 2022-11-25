<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'admin',
            'phone' => '1635355454',
            'is_admin' => true, 
            'link' => '$2y$10$7XgfzFoVSEOVn7PjadaFGux0yGc0IXvVBOXJN_kjqlQhk5Pqmd_ci', 
            'expires_at' => date('Y-m-d H:i:s', strtotime("5 days"))
        ]);
    }
}
