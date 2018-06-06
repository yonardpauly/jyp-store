<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'name' => 'Mr. Admin',
        	'address' => 'Renaissance Meralco Avenue Pasig City',
        	'email' => 'admin@admin.com',
        	'password' => Hash::make('123admin321'),
        	'created_at' => now(),
        	'updated_at' => now()
        ]);
    }
}
