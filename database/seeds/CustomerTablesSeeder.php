<?php

use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            'address' => 'Bình Thạnh', 
            'phone_number' => '1234567890',
            'driver_license' => 'AB995471',
            'id_card' => '221358970',
            'passport' => '87728918212',
            'customer_status' => 'Accepted',
            'images' => null,
            'id_image_f' => null,
            'id_image_b' => null,
            'user_id' => 3
        ]);
    }
}
