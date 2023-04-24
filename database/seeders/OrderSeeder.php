<?php

namespace Database\Seeders;

use App\ModelConstants\OrderStatusConstants;
use App\ModelConstants\PaymentMethodConstants;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    const RANDOM_ORDER_COUNT = 4;
    const RANDOM_PRODUCT_COUNT = 4;
    const RANDOM_CUSTOMER_COUNT = 4;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = $this->getRandomCustomers(static::RANDOM_CUSTOMER_COUNT);
        foreach ($customers as $customer) {
            $deliveryAddress = $this->getCustomerDeliveryAddress($customer->id);
            $this->generateRandomOrders(static::RANDOM_ORDER_COUNT, $customer->id, $deliveryAddress);
        }
    }

    /**
     * Get random customers have a delivery address
     */
    private function getRandomCustomers($customerCount)
    {
        return DB::table('customers')
            ->join('customer_addresses', 'customer_id', '=', 'customers.id')
            ->select('customers.*')
            ->distinct()
            ->where([
                'delete_flag' => false,
                'disable_flag' => false,
            ])
            ->inRandomOrder()
            ->limit($customerCount)
            ->get();
    }

    private function getCustomerDeliveryAddress($customerId)
    {
        $customerAddress = CustomerAddress::where('customer_id', $customerId)
            ->inRandomOrder()
            ->first();

        return '(' . $customerAddress->address_type . ') '
            . $customerAddress->specific_address . ', '
            . $customerAddress->ward . ', '
            . $customerAddress->district . ', '
            . $customerAddress->city;
    }

    private function generateRandomOrders($orderCount, $customerId, $deliveryAddress)
    {
        $orderStatusArray = OrderStatusConstants::toArray();
        $paymentMethods = PaymentMethodConstants::toArray();
        for ($i = 0; $i < $orderCount; $i++) {
            $order = Order::create([
                'customer_id' => $customerId,
                'delivery_address' => $deliveryAddress,
                'status' => $orderStatusArray[mt_rand(0, count($orderStatusArray) - 1)],
                'payment_method' => $paymentMethods[mt_rand(0, count($paymentMethods) - 1)],
            ]);

            $products = $this->getRandomProducts(static::RANDOM_PRODUCT_COUNT);
            foreach ($products as $product) {
                $quantity = mt_rand(1, 2);
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'total_price' => $product->price * (1 - $product->discount_percent / 100) * $quantity,
                ]);
            }
        }
    }

    private function getRandomProducts($productCount)
    {
        return Product::where('delete_flag', false)
            ->inRandomOrder()
            ->limit($productCount)
            ->get();
    }
}
