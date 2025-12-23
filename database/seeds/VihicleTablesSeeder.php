<?php

use Illuminate\Database\Seeder;
use App\Models\Vihicle;

class VihicleTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vihicle::create([
            'vihicle_name' => 'Hyundai SantaFe',
            'vihicle_price' => '50000',
            'vihicle_deposit' => '5000',
            'vihicle_images' => [
                'hyundai-santafe-2019-1.jpg',
                'hyundai-santafe-2019-3.jpg',
                'hyundai-santafe-2019-4.jpg',
                'hyundai-santafe-2019.png'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '4.770 x 1.890 x 1.680',
            'engine' => 'Theta II 2.4 GDI',
            'cylinder_capacity' => '',
            'maximum_power' => '188 mã lực tại 6.000 vòng/phút',
            'maximum_torque' => '241Nm tại 4.000 vòng/phút',
            'gearbox' => 'MT',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '7-2016',
            'register_time' => '2017',
            'vihicle_status' => 'Wait',
            'company_id' => 1,
            'brand_id' => 5,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Honda',
            'vihicle_price' => '100000',
            'vihicle_deposit' => '10000',
            'vihicle_images' => [
                'brio-1.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '7',
            'size' => '5.110 x 1.690 x 1.480',
            'engine' => 'Theta II 2.4 GDI',
            'cylinder_capacity' => '',
            'maximum_power' => '201 mã lực tại 7.000 vòng/phút',
            'maximum_torque' => '241Nm tại 5.000 vòng/phút',
            'gearbox' => 'MT',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '1-2017',
            'register_time' => '2019',
            'vihicle_status' => 'Wait',
            'company_id' => 2,
            'brand_id' => 4,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Mercedes',
            'vihicle_price' => '150000',
            'vihicle_deposit' => '15000',
            'vihicle_images' => [
                'xe-mercedes-benz-cla200-mau-do-1.jpg',
                'xe-mercedes-benz-cla200-mau-do-2.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '3.770 x 1.590 x 1.380',
            'engine' => 'Mer C4 Turbo',
            'cylinder_capacity' => '',
            'maximum_power' => '220 mã lực tại 5.500 vòng/phút',
            'maximum_torque' => '341Nm tại 5.000 vòng/phút',
            'gearbox' => 'BMW 2.5',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '9-2019',
            'register_time' => '2020',
            'vihicle_status' => 'Wait',
            'company_id' => 1,
            'brand_id' => 19,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Toyota86',
            'vihicle_price' => '200000',
            'vihicle_deposit' => '20000',
            'vihicle_images' => [
                'toyota-innova-2019-1.jpg',
                'toyota-innova-2019-2.jpg',
                'toyota-innova-2019-3.jpg',
                'toyota-innova-2019-4.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '3.170 x 1.190 x 1.180',
            'engine' => 'Toyota 4Vin Turbo',
            'cylinder_capacity' => '',
            'maximum_power' => '180 mã lực tại 4.500 vòng/phút',
            'maximum_torque' => '241Nm tại 4.000 vòng/phút',
            'gearbox' => 'Toyota 6N',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '9-2017',
            'register_time' => '2017',
            'vihicle_status' => 'Wait',
            'company_id' => 2,
            'brand_id' => 1,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Hyundai SantaFe 1',
            'vihicle_price' => '250000',
            'vihicle_deposit' => '25000',
            'vihicle_images' => [
                'hyundai-santafe-2019-1.jpg',
                'hyundai-santafe-2019-3.jpg',
                'hyundai-santafe-2019-4.jpg',
                'hyundai-santafe-2019.png'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '4.770 x 1.890 x 1.680',
            'engine' => 'Theta II 2.4 GDI',
            'cylinder_capacity' => '',
            'maximum_power' => '188 mã lực tại 6.000 vòng/phút',
            'maximum_torque' => '241Nm tại 4.000 vòng/phút',
            'gearbox' => 'MT',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '7-2016',
            'register_time' => '2017',
            'vihicle_status' => 'Wait',
            'company_id' => 1,
            'brand_id' => 5,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Honda 1',
            'vihicle_price' => '300000',
            'vihicle_deposit' => '30000',
            'vihicle_images' => [
                'brio-1.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '7',
            'size' => '5.110 x 1.690 x 1.480',
            'engine' => 'Theta II 2.4 GDI',
            'cylinder_capacity' => '',
            'maximum_power' => '201 mã lực tại 7.000 vòng/phút',
            'maximum_torque' => '241Nm tại 5.000 vòng/phút',
            'gearbox' => 'MT',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '1-2017',
            'register_time' => '2019',
            'vihicle_status' => 'Wait',
            'company_id' => 2,
            'brand_id' => 4,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Mercedes 1',
            'vihicle_price' => '350000',
            'vihicle_deposit' => '35000',
            'vihicle_images' => [
                'xe-mercedes-benz-cla200-mau-do-1.jpg',
                'xe-mercedes-benz-cla200-mau-do-2.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '3.770 x 1.590 x 1.380',
            'engine' => 'Mer C4 Turbo',
            'cylinder_capacity' => '',
            'maximum_power' => '220 mã lực tại 5.500 vòng/phút',
            'maximum_torque' => '341Nm tại 5.000 vòng/phút',
            'gearbox' => 'BMW 2.5',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '9-2019',
            'register_time' => '2020',
            'vihicle_status' => 'Wait',
            'company_id' => 1,
            'brand_id' => 19,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Toyota86 1',
            'vihicle_price' => '400000',
            'vihicle_deposit' => '40000',
            'vihicle_images' => [
                'toyota-innova-2019-1.jpg',
                'toyota-innova-2019-2.jpg',
                'toyota-innova-2019-3.jpg',
                'toyota-innova-2019-4.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '3.170 x 1.190 x 1.180',
            'engine' => 'Toyota 4Vin Turbo',
            'cylinder_capacity' => '',
            'maximum_power' => '180 mã lực tại 4.500 vòng/phút',
            'maximum_torque' => '241Nm tại 4.000 vòng/phút',
            'gearbox' => 'Toyota 6N',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '9-2017',
            'register_time' => '2017',
            'vihicle_status' => 'Wait',
            'company_id' => 2,
            'brand_id' => 1,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Hyundai SantaFe 2',
            'vihicle_price' => '450000',
            'vihicle_deposit' => '45000',
            'vihicle_images' => [
                'hyundai-santafe-2019-1.jpg',
                'hyundai-santafe-2019-3.jpg',
                'hyundai-santafe-2019-4.jpg',
                'hyundai-santafe-2019.png'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '4.770 x 1.890 x 1.680',
            'engine' => 'Theta II 2.4 GDI',
            'cylinder_capacity' => '',
            'maximum_power' => '188 mã lực tại 6.000 vòng/phút',
            'maximum_torque' => '241Nm tại 4.000 vòng/phút',
            'gearbox' => 'MT',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '7-2016',
            'register_time' => '2017',
            'vihicle_status' => 'Wait',
            'company_id' => 1,
            'brand_id' => 5,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Honda 2',
            'vihicle_price' => '500000',
            'vihicle_deposit' => '50000',
            'vihicle_images' => [
                'brio-1.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '7',
            'size' => '5.110 x 1.690 x 1.480',
            'engine' => 'Theta II 2.4 GDI',
            'cylinder_capacity' => '',
            'maximum_power' => '201 mã lực tại 7.000 vòng/phút',
            'maximum_torque' => '241Nm tại 5.000 vòng/phút',
            'gearbox' => 'MT',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '1-2017',
            'register_time' => '2019',
            'vihicle_status' => 'Wait',
            'company_id' => 2,
            'brand_id' => 4,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Mercedes 2',
            'vihicle_price' => '550000',
            'vihicle_deposit' => '55000',
            'vihicle_images' => [
                'xe-mercedes-benz-cla200-mau-do-1.jpg',
                'xe-mercedes-benz-cla200-mau-do-2.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '3.770 x 1.590 x 1.380',
            'engine' => 'Mer C4 Turbo',
            'cylinder_capacity' => '',
            'maximum_power' => '220 mã lực tại 5.500 vòng/phút',
            'maximum_torque' => '341Nm tại 5.000 vòng/phút',
            'gearbox' => 'BMW 2.5',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '9-2019',
            'register_time' => '2020',
            'vihicle_status' => 'Wait',
            'company_id' => 1,
            'brand_id' => 19,
        ]);

        Vihicle::create([
            'vihicle_name' => 'Toyota86 2',
            'vihicle_price' => '600000',
            'vihicle_deposit' => '60000',
            'vihicle_images' => [
                'toyota-innova-2019-1.jpg',
                'toyota-innova-2019-2.jpg',
                'toyota-innova-2019-3.jpg',
                'toyota-innova-2019-4.jpg'
            ],
            'license_plate' => null,
            'number_chair' => '4',
            'size' => '3.170 x 1.190 x 1.180',
            'engine' => 'Toyota 4Vin Turbo',
            'cylinder_capacity' => '',
            'maximum_power' => '180 mã lực tại 4.500 vòng/phút',
            'maximum_torque' => '241Nm tại 4.000 vòng/phút',
            'gearbox' => 'Toyota 6N',
            'color' => '#1532dd',
            'weight' => '',
            'year_manufacture' => '9-2017',
            'register_time' => '2017',
            'vihicle_status' => 'Wait',
            'company_id' => 2,
            'brand_id' => 1,
        ]);
    }
}
