<?php

use Illuminate\Database\Seeder;

use App\Models\Service;

class ServiceTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert(
            [
                'service_name' => 'ĐI TỈNH ĐỒNG NAI',
                'price' => '1300000',
                'time' => '1 ngày',
                'distance' => '40km',
                'service_status' => 1,
            ]);
    
            // Service::insert(
            // [
            //     'service_name' => '',
            //     'price' => '',
            //     'time' => '',
            //     'distance' => '',
            //     'service_status' => '',
            // ]);
    
            // Service::insert(
            // [
            //     'service_name' => '',
            //     'price' => '',
            //     'time' => '',
            //     'distance' => '',
            //     'service_status' => '',
            // ]);
    
            // Service::insert(
            // [
            //     'service_name' => '',
            //     'price' => '',
            //     'time' => '',
            //     'distance' => '',
            //     'service_status' => '',
            // ]);
    
            // Service::insert(
            // [
            //     'service_name' => '',
            //     'price' => '',
            //     'time' => '',
            //     'distance' => '',
            //     'service_status' => '',
            // ]);
    }
}
