<?php

use Illuminate\Database\Seeder;
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

            'name' => 'Jeans ala BNCC',
            'slug' => 'jeans-bncc',
            'details' => 'Bahan Jeans, 2 Kantong',
            'price' => 150000,
            'description' => 'Spicy jalapeno bacon ipsum dolor amet shank jerky cupim beef ribs kevin pork belly jowl 
            tongue biltong tail capicola picanha short ribs cow. 
            Meatball pastrami alcatra, leberkas chuck andouille pancetta pork hamburger shankle.'

        ])->categories()->attach(1);

        Product::create([

            'name' => 'Kaos ala BNCC',
            'slug' => 'kaos-bncc',
            'details' => 'Bahan katun, warna putih',
            'price' => 100000,
            'description' => 'Spicy jalapeno bacon ipsum dolor amet shank jerky cupim beef ribs kevin pork belly jowl 
            tongue biltong tail capicola picanha short ribs cow. 
            Meatball pastrami alcatra, leberkas chuck andouille pancetta pork hamburger shankle.'

        ])->categories()->attach(2);

        Product::create([

            'name' => 'Kutang ala BNCC',
            'slug' => 'kutang-bncc',
            'details' => 'Bahan katun, Polkadot',
            'price' => 50000,
            'description' => 'Spicy jalapeno bacon ipsum dolor amet shank jerky cupim beef ribs kevin pork belly jowl 
            tongue biltong tail capicola picanha short ribs cow. 
            Meatball pastrami alcatra, leberkas chuck andouille pancetta pork hamburger shankle.'

        ])->categories()->attach(3);

        Product::create([

            'name' => 'Kaos Kutang ala BNCC',
            'slug' => 'kaos-1-bncc',
            'details' => 'Bahan sutra',
            'price' => 70000,
            'description' => 'Spicy jalapeno bacon ipsum dolor amet shank jerky cupim beef ribs kevin pork belly jowl
            tongue biltong tail capicola picanha short ribs cow.
            Meatball pastrami alcatra, leberkas chuck andouille pancetta pork hamburger shankle.'

        ])->categories()->attach(3);

        $product = Product::findOrFail(4);
        $product->categories()->attach(2);
    }
}
