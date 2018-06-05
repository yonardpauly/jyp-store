<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Product::create([
            'name' => 'Asus ROG Phone',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-rog-phone',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus ZenFone Live (L1) ZA550KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-live-(L1)-za55kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone Max Pro (M1) ZB601KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-max-pro-(ml)-zb601kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 5z ZS620KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-5z-zs620kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 5 ZE620KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-5-ze620kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 5 Lite ZC600KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-5-lite-zc600kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone Max (M1) ZB555KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-max-(m1)-zb555kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone Max Plus (M1) ZB570TL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-max-plus-(m1)-zb570tl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone V V520KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-v-v520kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 4 Pro ZS551KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-4-pro-zs551kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 4 ZE554KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-4-ze554kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 4 Selfie Lite ZB553KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-4-selfie-lite-zb553kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 4 Selfie ZB553KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-4-selfie-zb553kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 4 Selfie Pro ZD552KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-4-selfie-pro-zd552kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Product::create([
            'name' => 'Asus Zenfone 4 Selfie ZD553KL',
            'item_categories_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga debitis iste necessitatibus at adipisci explicabo nisi nulla in maxime.',
            'price' => rand(15000, 50000),
            'quantity' => rand(50, 100),
            'slug' => 'asus-zenfone-4-selfie-zd553kl',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
