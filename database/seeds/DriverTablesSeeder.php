<?php

use Illuminate\Database\Seeder;

use App\Models\Driver;

class DriverTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::insert(
            [
                'driver_name' => 'Nguyễn Ngọc Mai',
                'sex' => 'female',
                'age' => '30',
                'driver_images' => 'nguyen-ngoc-mai.jpg',
                'phone_mumber' => '0909383171',
                'experience' => '3 năm',
            ]);  
            
            Driver::insert(
            [
                'driver_name' => 'Trần Thị Tuyết Dung',
                'sex' => 'female',
                'age' => '33',
                'driver_images' => 'tran-thi-tuyet-dung.jpg',
                'phone_mumber' => '0909383174',
                'experience' => '4 năm',
            ]);   
    
            Driver::insert(
            [
                'driver_name' => 'Lê Mỹ Mỹ',
                'sex' => 'female',
                'age' => '29',
                'driver_images' => 'le-my-my.jpg',
                'phone_mumber' => '0909383393',
                'experience' => '2 năm',
            ]);   
    
            Driver::insert(
            [
                'driver_name' => 'Nguyễn Tuấn Vũ',
                'sex' => 'male',
                'age' => '29',
                'driver_images' => 'nguyen-tuan-vu.jpg',
                'phone_mumber' => '0383911933',
                'experience' => '1 năm',
            ]);   
    
            Driver::insert(
            [
                'driver_name' => 'Lê Đăng Khoa',
                'sex' => 'male',
                'age' => '27',
                'driver_images' => 'le-dang-khoa.jpg',
                'phone_mumber' => '0929383000',
                'experience' => '2 năm',
            ]);   
    }
}
