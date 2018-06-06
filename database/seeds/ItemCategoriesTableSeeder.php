<?php

use Illuminate\Database\Seeder;
use App\ItemCategory;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ItemCategory::create([
        	'name' => 'Smartphone',
        	'created_at' => now(),
        	'updated_at' => now()
        ]);
    }
}
