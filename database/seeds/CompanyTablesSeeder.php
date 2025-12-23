<?php

use Illuminate\Database\Seeder;

use App\Models\Company;

class CompanyTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'company_name' => 'Công ty TNHH DV-VT Trọng Tấn', 
            'image' => 'logo-cty-trong-tan.png',
            'images' => null, 
            'address_number' => '789 Lê Thị Riêng', 
            'address_ward' => 'Thới An', 
            'address_district' =>  '12', 
            'address_city' => 'Ho Chi Minh',
            'address_country' => 'Viet Nam',
            'tax_code' => '031 2527 659',
            'phone_number' => '(84) 08 62590486',
            'hotline' => '0945 74 74 77 – 0912 79 79 49',
            'fax' => '08 62590488',
            'email' => 'tranthanhdoanshs@gmail.com',
            'company_status' => 'Operating',
        ]);
    
        Company::create([
            'company_name' => 'CÔNG TY TNHH XE SÀI GÒN', 
            'image' => 'logo-thue-xe-sai-gon.png',
            'images' => null,
            'address_number' => '72 Lê Thánh Tôn', 
            'address_ward' => 'Bến Nghé', 
            'address_district' =>  '1', 
            'address_city' => 'Ho Chi Minh',
            'address_country' => 'Viet Nam',
            'tax_code' => null,
            'phone_number' => '0909.99.05.07',
            'hotline' => '0938.144.322 – 0708.990.991',
            'fax' => null,
            'email' => 'mangxeviet@gmail.com',
            'company_status' => 'Operating',
        ]);
        
    }
}
