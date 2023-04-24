<?php

namespace Database\Seeders;

use App\Common\Constants;
use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'American Tourister',
            'slug' => 'american-tourister',
            'logo_path' => Constants::BRAND_LOGO_PATH . '/american-tourister.png',
            'delete_flag' => false,
        ]);
        Brand::create([
            'name' => 'Casio',
            'slug' => 'casio',
            'logo_path' => Constants::BRAND_LOGO_PATH . '/casio.jpg',
            'delete_flag' => false,
        ]);
        Brand::create([
            'name' => 'Fossil',
            'slug' => 'fossil',
            'logo_path' => Constants::BRAND_LOGO_PATH . '/fossil.jpg',
            'delete_flag' => false,
        ]);
        Brand::create([
            'name' => 'Samsonite',
            'slug' => 'samsonite',
            'logo_path' => Constants::BRAND_LOGO_PATH . '/samsonite.png',
            'delete_flag' => false,
        ]);
        Brand::create([
            'name' => 'Tumi',
            'slug' => 'tumi',
            'logo_path' => Constants::BRAND_LOGO_PATH . '/tumi.png',
            'delete_flag' => false,
        ]);
        Brand::create([
            'name' => 'Yame',
            'slug' => 'yame',
            'logo_path' => Constants::BRAND_LOGO_PATH . '/yame.jpg',
            'delete_flag' => false,
        ]);
    }
}
