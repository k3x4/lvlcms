<?php

use Illuminate\Database\Seeder;
use App\MediaSize;

class MediaSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mediaSizes = [
            
            [
                'tag' => 'thumb',
                'width' => 150,
                'height' => 150,
            ],
            [
                'tag' => 'medium',
                'width' => 300,
                'height' => 300
            ],
            [
                'tag' => 'large',
                'width' => 1024,
                'height' => 1024
            ]

        ];
        
        foreach ($mediaSizes as $mediaSize) {
            MediaSize::create($mediaSize);
        }
    }
}
