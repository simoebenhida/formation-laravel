<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phone = factory('App\Category')->create(['name' => 'Phone']);
        $computer = factory('App\Category')->create(['name' => 'Computer']);

        factory('App\Product')->create([
            'name' => 'Macbook Pro 2015',
            'price' => 2000,
            'category_id' => $computer->id,
            'description' => 'Macbook Pro'
        ]);

        factory('App\Product')->create([
            'name' => 'Macbook Air',
            'price' => 1000,
            'category_id' => $computer->id,
            'description' => 'Macbook Air'
        ]);

        factory('App\Product')->create([
            'name' => 'Macbook Pro Retina 2017',
            'price' => 2500,
            'category_id' => $computer->id,
            'description' => 'Macbook Pro Retina 2017'
        ]);

        factory('App\Product')->create([
            'name' => 'Imac',
            'price' => 2000,
            'category_id' => $computer->id,
            'description' => 'Imac'
        ]);

        factory('App\Product')->create([
            'name' => 'Iphone 8',
            'price' => 700,
            'category_id' => $phone->id,
            'description' => 'Iphone 8'
        ]);

        factory('App\Product')->create([
            'name' => 'Iphone 7',
            'price' => 500,
            'category_id' => $phone->id,
            'description' => 'Iphone 7'
        ]);

        factory('App\Product')->create([
            'name' => 'Iphone X',
            'price' => 1000,
            'category_id' => $phone->id,
            'description' => 'Iphone X'
        ]);
    }
}
