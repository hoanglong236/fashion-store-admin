<?php

namespace Database\Seeders;

use App\ModelConstants\AddressType;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    const RANDOM_PRODUCT_COUNT = 3;
    const RANDOM_CUSTOMER_COUNT = 8;
    const NON_HASH_PASSWORD = 'Abc12345';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->generateMainCustomer();
        $this->generateCustomers();
    }

    private function generateMainCustomer()
    {
        $customer = Customer::create([
            'name' => 'Customer Z0',
            'gender' => true,
            'phone' => '1234567890',
            'email' => 'customer@gmail.com',
            'password' => Hash::make(static::NON_HASH_PASSWORD),
            'disable_flag' => false,
            'delete_flag' => false,
        ]);

        $this->generateCustomerAddresses($customer->id);
        $this->generateCustomerCartAndCartItems($customer->id);
    }

    private function generateCustomerAddresses($customerId)
    {
        $baseAddresses = [
            [
                'city' => 'Thanh pho Can Tho',
                'district' => 'Quan Ninh Kieu',
                'ward' => 'Phuong Xuan Khanh',
                'specific_address' => 'DHCT Khu 2, Duong 3/2',
                'address_type' => AddressType::OFFICE,
                'default_flag' => false,
            ],
            [
                'city' => 'Thanh pho Can Tho',
                'district' => 'Quan Ninh Kieu',
                'ward' => 'Phuong An Binh',
                'specific_address' => 'Dai hoc FPT, Duong Nguyen Van Cu',
                'address_type' => AddressType::OFFICE,
                'default_flag' => false,
            ],
        ];

        $addressCount = mt_rand(1, count($baseAddresses));
        for ($i = 0; $i < $addressCount; $i++) {
            $address = $baseAddresses[$i];
            $address['customer_id'] = $customerId;

            CustomerAddress::create($address);
        }
    }

    private function generateCustomerCartAndCartItems($customerId)
    {
        $cart = Cart::create([
            'customer_id' => $customerId,
        ]);

        $products = $this->getRandomProducts(static::RANDOM_PRODUCT_COUNT);
        foreach ($products as $product) {
            $quantity = mt_rand(1, 2);
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }
    }

    private function getRandomProducts($productCount)
    {
        return Product::where('delete_flag', false)
            ->inRandomOrder()
            ->limit($productCount)
            ->get();
    }

    private function generateCustomers()
    {
        $password = Hash::make(static::NON_HASH_PASSWORD);
        for ($i = 0; $i < static::RANDOM_CUSTOMER_COUNT; $i++) {
            $customer = Customer::create([
                'name' => 'Customer ' . ($i + 1),
                'gender' => mt_rand(0, 1) === 1,
                'phone' => '123456789' . ($i + 1),
                'email' => 'customer' . ($i + 1) . '@gmail.com',
                'password' => $password,
                'disable_flag' => mt_rand(0, 1) === 1,
                'delete_flag' => false,
            ]);
            $this->generateCustomerAddresses($customer->id);
            $this->generateCustomerCartAndCartItems($customer->id);
        }
    }
}
