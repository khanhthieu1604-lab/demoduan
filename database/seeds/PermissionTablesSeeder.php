<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\User;

class PermissionTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'companyManagerCreate']);
        Permission::create(['name' => 'companyManagerDelete']);
        Permission::create(['name' => 'companyManagerUpdate']);
        Permission::create(['name' => 'companyManagerShow']);
        Permission::create(['name' => 'companyManagerList']);

        Permission::create(['name' => 'employerCreate']);
        Permission::create(['name' => 'employerDelete']);
        Permission::create(['name' => 'employerUpdate']);
        Permission::create(['name' => 'employerShow']);
        Permission::create(['name' => 'employerList']);
        Permission::create(['name' => 'employerSeeName']);
        Permission::create(['name' => 'employerSeeEmail']);
        Permission::create(['name' => 'employerSeePassword']);

        Permission::create(['name' => 'companyCreate']);
        Permission::create(['name' => 'companyDelete']);
        Permission::create(['name' => 'companyUpdate']);
        Permission::create(['name' => 'companyShow']);
        Permission::create(['name' => 'companyList']);

        Permission::create(['name' => 'vihicleCreate']);
        Permission::create(['name' => 'vihicleDelete']);
        Permission::create(['name' => 'vihicleUpdate']);
        Permission::create(['name' => 'vihicleShow']);
        Permission::create(['name' => 'vihicleList']);

        Permission::create(['name' => 'serviceCreate']);
        Permission::create(['name' => 'serviceDelete']);
        Permission::create(['name' => 'serviceUpdate']);
        Permission::create(['name' => 'serviceShow']);
        Permission::create(['name' => 'serviceList']);

        Permission::create(['name' => 'brandCreate']);
        Permission::create(['name' => 'brandDelete']);
        Permission::create(['name' => 'brandUpdate']);
        Permission::create(['name' => 'brandShow']);
        Permission::create(['name' => 'brandList']);

        Permission::create(['name' => 'driverCreate']);
        Permission::create(['name' => 'driverDelete']);
        Permission::create(['name' => 'driverUpdate']);
        Permission::create(['name' => 'driverShow']);
        Permission::create(['name' => 'driverList']);

        Permission::create(['name' => 'newsCreate']);
        Permission::create(['name' => 'newsDelete']);
        Permission::create(['name' => 'newsUpdate']);
        Permission::create(['name' => 'newsShow']);
        Permission::create(['name' => 'newsList']);

        Permission::create(['name' => 'contractCreate']);
        Permission::create(['name' => 'contractDelete']);
        Permission::create(['name' => 'contractUpdate']);
        Permission::create(['name' => 'contractShow']);
        Permission::create(['name' => 'contractList']);

        Permission::create(['name' => 'customerCreate']);
        Permission::create(['name' => 'customerDelete']);
        Permission::create(['name' => 'customerUpdate']);
        Permission::create(['name' => 'customerShow']);
        Permission::create(['name' => 'customerList']);
        Permission::create(['name' => 'customerSeeName']);
        Permission::create(['name' => 'customerSeeEmail']);
        Permission::create(['name' => 'customerSeePassword']);


        //Create role1 & give permission to role1
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $role1 = Role::create(['name' => 'super-admin']);
        $role1->givePermissionTo([
            'companyManagerCreate',
            'companyManagerDelete',
            'companyManagerUpdate',
            'companyManagerShow',
            'companyManagerList',
            'employerCreate',
            'employerDelete',
            'employerUpdate',
            'employerShow',
            'employerList',
            'employerSeeName',
            'employerSeeEmail',
            'employerSeePassword',
            'companyCreate',
            'companyDelete',
            'companyUpdate',
            'companyShow',
            'companyList',
            'vihicleCreate',
            'vihicleDelete',
            'vihicleUpdate',
            'vihicleShow',
            'vihicleList',
            'serviceCreate',
            'serviceDelete',
            'serviceUpdate',
            'serviceShow',
            'serviceList',
            'brandCreate',
            'brandDelete',
            'brandUpdate',
            'brandShow',
            'brandList',
            'driverCreate',
            'driverDelete',
            'driverUpdate',
            'driverShow',
            'driverList',
            'newsCreate',
            'newsDelete',
            'newsUpdate',
            'newsShow',
            'newsList',
            'contractCreate',
            'contractDelete',
            'contractUpdate',
            'contractShow',
            'contractList',
            'customerCreate',
            'customerDelete',
            'customerUpdate',
            'customerShow',
            'customerList',
            'customerSeeName',
            'customerSeeEmail',
            'customerSeePassword',
        ]);

        //Create role2 & give permission to role2
        $role2 = Role::create(['name' => 'companyManager']);
        $role2->givePermissionTo([
            'employerCreate',
            'employerDelete',
            'employerUpdate',
            'employerShow',
            'employerList',
            'employerSeeName',
            'employerSeeEmail',
            'employerSeePassword',
            'vihicleCreate',
            'vihicleDelete',
            'vihicleUpdate',
            'vihicleShow',
            'vihicleList',
            'serviceCreate',
            'serviceDelete',
            'serviceUpdate',
            'serviceShow',
            'serviceList',
            'brandCreate',
            'brandDelete',
            'brandUpdate',
            'brandShow',
            'brandList',
            'driverCreate',
            'driverDelete',
            'driverUpdate',
            'driverShow',
            'driverList',
            'newsCreate',
            'newsDelete',
            'newsUpdate',
            'newsShow',
            'newsList',
            'contractCreate',
            'contractDelete',
            'contractUpdate',
            'contractShow',
            'contractList',
            'customerCreate',
            'customerDelete',
            'customerUpdate',
            'customerShow',
            'customerList',
            'customerSeeName',
            'customerSeeEmail',
            'customerSeePassword',
        ]);

        //Create role3 & give permission to role3
        $role3 = Role::create(['name' => 'employer']);
        $role3->givePermissionTo([
            'vihicleCreate',
            'vihicleUpdate',
            'vihicleList',
            'serviceCreate',
            'serviceUpdate',
            'serviceList',
            'brandCreate',
            'brandUpdate',
            'brandList',
            'driverCreate',
            'driverUpdate',
            'driverList',
            'newsCreate',
            'newsUpdate',
            'newsList',
            'contractCreate',
            'contractUpdate',
            'contractList',
            'customerCreate',
            'customerUpdate',
            'customerList',
            'customerSeeName',
            'customerSeeEmail',
            'customerSeePassword',
        ]);

        // create users & gice role
        $user = Factory(User::class)->create([
            'name' => 'admin',
			'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'company_id' => 1
        ]);
        $user->assignRole($role2);

        $user = Factory(User::class)->create([
			'name' => 'Trần An Vy', 
            'email' => 'anvytran@gmail.com',
            'password' => bcrypt('asdf1234'),
            'company_id' => 1
        ]);
		$user->assignRole($role3);

		$user = Factory(User::class)->create([
			'name' => 'Trần Kim Liên', 
            'email' => 'kimlien@gmail.com',
            'password' => bcrypt('asdf1234'),
            'company_id' => 2
        ]);
		$user->assignRole($role3);

        $user = Factory(User::class)->create([
            'name' => 'super-admin',
			'email' => 'superadmin@admin.com',
			'password' => bcrypt('admin'),
        ]);
        $user->assignRole($role1);
    }
}