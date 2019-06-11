<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Sagar Sitaula',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@123'),
            'remember_token'=>str_random(10),
        ]);
    }
}
