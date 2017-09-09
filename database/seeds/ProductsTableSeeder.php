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
        $products = [
            
            [
                'title' => 'Neque porro quisquam est',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'title' => 'Ut sapien erat, convallis',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'title' => 'Sed aliquam felis',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],
            [
                'title' => 'Maecenas volutpat ligula',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                                .'Sed tristique interdum vestibulum. Phasellus vel nunc sem. '
                                .'Sed egestas diam felis, faucibus dignissim urna condimentum id. '
                                .'Duis eu euismod elit. Aliquam vitae dapibus neque. Morbi dapibus '
                                .'hendrerit velit. Proin et luctus enim.'
            ],

        ];
        
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
