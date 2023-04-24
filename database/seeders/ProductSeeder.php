<?php

namespace Database\Seeders;

use App\Common\Constants;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->generateSuitcases();
        $this->generateBackpacks();
        $this->generateWatches();
        $this->generateBags();
        $this->generateWallets();
    }

    private function generateSuitcases(): void
    {
        $category = Category::where(['slug' => 'suitcase', 'delete_flag' => false])->first();
        $productInfoArray = [
            [
                'name' => 'American Tourister Bombay Beach 4 Wheel',
                'slug' => 'american-tourister-bombay-beach-4-wheel',
                'brand_slug' => 'american-tourister',
            ],
            [
                'name' => 'American Tourister Sea Seeker',
                'slug' => 'american-tourister-sea-seeker',
                'brand_slug' => 'american-tourister',
            ],
            [
                'name' => 'American Tourister Jet Drive 4 Wheel',
                'slug' => 'american-tourister-jet-drive-4-wheel',
                'brand_slug' => 'american-tourister',
            ],
            [
                'name' => 'American Tourister Funshine 4 Wheel',
                'slug' => 'american-tourister-funshine-4-wheel',
                'brand_slug' => 'american-tourister',
            ],
            [
                'name' => 'American Tourister Crosstrack 4 Wheel',
                'slug' => 'american-tourister-crosstrack-4-wheel',
                'brand_slug' => 'american-tourister',
            ],
            [
                'name' => 'Samsonite Roader 2 Wheel',
                'slug' => 'samsonite-roader-2-wheel',
                'brand_slug' => 'samsonite',
            ],
            [
                'name' => 'Samsonite Citybeat 4 Wheel',
                'slug' => 'samsonite-citybeat-4-wheel',
                'brand_slug' => 'samsonite',
            ],
            [
                'name' => 'Samsonite Airea 4 Wheel',
                'slug' => 'samsonite-airea-4-wheel',
                'brand_slug' => 'samsonite',
            ],
            [
                'name' => 'Samsonite Popsoda 4 Wheel',
                'slug' => 'samsonite-popsoda-4-wheel',
                'brand_slug' => 'samsonite',
            ],
        ];

        $this->generateProductsByInfoArray($productInfoArray, $category->id);
    }

    private function generateBackpacks()
    {
        $category = Category::where(['slug' => 'backpack', 'delete_flag' => false])->first();
        $productInfoArray = [
            [
                'name' => 'Celina Backpack 0146566T522',
                'slug' => 'celina-backpack-0146566T522',
                'brand_slug' => 'tumi',
            ],
            [
                'name' => 'Tumi Brief Pack 01173381009',
                'slug' => 'tumi-brief-pack-01173381009',
                'brand_slug' => 'tumi',
            ],
            [
                'name' => 'Warre Backpack 01420731374',
                'slug' => 'warren-backpack-01420731374',
                'brand_slug' => 'tumi',
            ],
            [
                'name' => 'Search Backpack 01424801041',
                'slug' => 'search-backpack-01424801041',
                'brand_slug' => 'tumi',
            ],
            [
                'name' => 'Nomadic Backpack 01466891041',
                'slug' => 'nomadic-backpack-01466891041',
                'brand_slug' => 'tumi',
            ],
            [
                'name' => 'Omnia Jacquard Backpack',
                'slug' => 'omnia-jacquard-backpack',
                'brand_slug' => 'yame',
            ],
            [
                'name' => 'Weather-Resistant-Survey-II Backpack',
                'slug' => 'weather-resistant-survey-ii-backpack',
                'brand_slug' => 'yame',
            ],
            [
                'name' => 'Backbag Y2010 Original Ver10 21781',
                'slug' => 'backbag-y2010-original-ver10-21781',
                'brand_slug' => 'yame',
            ],
        ];

        $this->generateProductsByInfoArray($productInfoArray, $category->id);
    }

    private function generateWatches(): void
    {
        $category = Category::where(['slug' => 'watch', 'delete_flag' => false])->first();
        $productInfoArray = [
            [
                'name' => 'CASIO GBD H2000 1A',
                'slug' => 'casio-gbd-h2000-1a',
                'brand_slug' => 'casio',
            ],
            [
                'name' => 'CASIO GM S2100B 8A',
                'slug' => 'casio-gm-s2100b-8a',
                'brand_slug' => 'casio',
            ],
            [
                'name' => 'Fossil Jacqueline ES5164',
                'slug' => 'fossil-jacqueline-es5164',
                'brand_slug' => 'fossil',
            ],
            [
                'name' => 'Fossil Carlie Mini ES4502',
                'slug' => 'fossil-carlie-mini-es4502',
                'brand_slug' => 'fossil',
            ],
        ];

        $this->generateProductsByInfoArray($productInfoArray, $category->id);
    }

    private function generateBags(): void
    {
        $category = Category::where(['slug' => 'bag', 'delete_flag' => false])->first();
        $productInfoArray = [
            [
                'name' => 'Fossil Defender Bag MBG9463001',
                'slug' => 'fossil-defender-bag-mbg9463001',
                'brand_slug' => 'fossil',
            ],
            [
                'name' => 'Fossil Greenville MBG9557222',
                'slug' => 'fossil-greenville-mbg9557222',
                'brand_slug' => 'fossil',
            ],
            [
                'name' => 'Fossil Gift Bags SL8263656',
                'slug' => 'fossil-gift-bags-sl8263656',
                'brand_slug' => 'fossil',
            ],
            [
                'name' => 'Fossil Harper Bags ZB1799001',
                'slug' => 'fossil-harper-bags-zb1799001',
                'brand_slug' => 'fossil',
            ],
            [
                'name' => 'Fossil Jolie Bags ZB1685180',
                'slug' => 'fossil-jolie-bags-zb1685180',
                'brand_slug' => 'fossil',
            ],
            [
                'name' => 'Fossil Heritage Bags ZB1817249',
                'slug' => 'fossil-heritage-bags-zb1817249',
                'brand_slug' => 'fossil',
            ],
        ];

        $this->generateProductsByInfoArray($productInfoArray, $category->id);
    }

    private function generateWallets()
    {
        $category = Category::where(['slug' => 'wallet', 'delete_flag' => false])->first();
        $productInfoArray = [
            [
                'name' => 'Men Wallet Fossil Anderson Ml4577001',
                'slug' => 'fossil-anderson-ml4577001',
                'brand_slug' => 'fossil',
            ],
            [
                'name' => 'Men Wallet Fossil Steven ML4395109',
                'slug' => 'fossil-steven-ml4395109',
                'brand_slug' => 'fossil',
            ],
        ];

        $this->generateProductsByInfoArray($productInfoArray, $category->id);
    }

    private function generateProductsByInfoArray($productInfoArray, $categoryId)
    {
        $brandSlugIdMap = $this->getBrandSlugIdMap();

        foreach ($productInfoArray as $productInfo) {
            $product = Product::create([
                'category_id' => $categoryId,
                'brand_id' => $brandSlugIdMap[$productInfo['brand_slug']],
                'name' => $productInfo['name'],
                'slug' => $productInfo['slug'],
                'price' => mt_rand(1, 9) * 10 + mt_rand(2, 9) * 100 + mt_rand(0, 1) * 1000,
                'discount_percent' => mt_rand(1, 4) * 10,
                'quantity' => 1000,
                'warranty_period' => 1,
                'description' => 'None',
                'main_image_path' => Constants::PRODUCT_IMAGE_PATH . '/' . $productInfo['slug'] . '.jpg',
                'delete_flag' => false,
            ]);
            $this->createProductImages($product->id, $productInfo['slug']);
        }
    }

    private function getBrandSlugIdMap()
    {
        $brands = Brand::where(['delete_flag' => false])->get();
        $map = [];
        foreach ($brands as $brand) {
            $map[$brand->slug] = $brand->id;
        }
        return $map;
    }

    private function createProductImages($productId, $productSlug)
    {
        ProductImage::create([
            'product_id' => $productId,
            'image_path' => Constants::PRODUCT_IMAGE_PATH . '/' . $productSlug . '.jpg',
        ]);
        ProductImage::create([
            'product_id' => $productId,
            'image_path' => Constants::PRODUCT_IMAGE_PATH . '/' . $productSlug . '-1.jpg',
        ]);
        ProductImage::create([
            'product_id' => $productId,
            'image_path' => Constants::PRODUCT_IMAGE_PATH . '/' . $productSlug . '-2.jpg',
        ]);
        ProductImage::create([
            'product_id' => $productId,
            'image_path' => Constants::PRODUCT_IMAGE_PATH . '/' . $productSlug . '-3.jpg',
        ]);
    }
}
