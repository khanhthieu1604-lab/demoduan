<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CompanyTablesSeeder::class,
            PermissionTablesSeeder::class,
            // UserTablesSeeder::class,
            BrandTablesSeeder::class,
            ContractTablesSeeder::class,
            ServiceTablesSeeder::class,
            VihicleTablesSeeder::class,
            CustomerTablesSeeder::class,
            DriverTablesSeeder::class,
            EmployerTablesSeeder::class,
            NewsTablesSeeder::class,
        ]);
    }
}
