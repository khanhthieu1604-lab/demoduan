<?php

use Illuminate\Database\Seeder;

use App\Models\Brand;

class BrandTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::insert(['brand_name' => 'Toyota', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Chevrolet', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Ford', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Honda', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Hyundai', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Isuzu', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Suzuki', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Kia', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Mitsubishi', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Lexus', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Mazda', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Nissan', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Subaru', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Ssangyong', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Land Rover', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Peugeot', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Porsche', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Volkswagen', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Mercedes Benz', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'BMW', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Mini Cooper', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Audi', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Lamborghini', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Volvo', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Jaguar', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Maserati', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Aston Martin', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Bentley', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Vinfast', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Limousine', 'brand_status' => 1]);
        
        //xe tai
        Brand::insert(['brand_name' => 'DongFeng', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Fuso', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'THACO - TRUONG HAI AUTO', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'JAC MOTORS', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'HINO', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'DOTHANH', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'DEAWOO', 'brand_status' => 1]);
        //xe may
        Brand::insert(['brand_name' => 'YAMAHA', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'Piaggio', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'SYM', 'brand_status' => 1]);
        Brand::insert(['brand_name' => 'KAWASAKI', 'brand_status' => 1]);
    }
}
