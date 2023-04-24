<?php

namespace Database\Seeders;

use App\Common\Constants;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Backpack',
            'slug' => 'backpack',
            'icon_path' => Constants::CATEGORY_ICON_PATH . '/backpack.png',
            'delete_flag' => false,
        ]);
        Category::create([
            'name' => 'Bag',
            'slug' => 'bag',
            'icon_path' => Constants::CATEGORY_ICON_PATH . '/bag.png',
            'delete_flag' => false,
        ]);
        Category::create([
            'name' => 'Suitcase',
            'slug' => 'suitcase',
            'icon_path' => Constants::CATEGORY_ICON_PATH . '/suitcase.png',
            'delete_flag' => false,
        ]);
        Category::create([
            'name' => 'Wallet',
            'slug' => 'wallet',
            'icon_path' => Constants::CATEGORY_ICON_PATH . '/wallet.png',
            'delete_flag' => false,
        ]);
        Category::create([
            'name' => 'Watch',
            'slug' => 'watch',
            'icon_path' => Constants::CATEGORY_ICON_PATH . '/watch.png',
            'delete_flag' => false,
        ]);
    }
}
