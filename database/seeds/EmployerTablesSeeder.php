<?php

use Illuminate\Database\Seeder;

use App\Models\Employer;

class EmployerTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::insert([
            'images' => 'tran-an-vy.jpg',
            'user_id' => 2,
            'company_id' => 1,
        ]);

        Employer::insert([
            'images' => 'tran-tieu-da.jpg',
            'user_id' => 3,
            'company_id' => 2,
        ]);

    }
}
