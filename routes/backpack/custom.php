<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.


Route::group(
    [
        'namespace'  => 'App\Http\Controllers\Admin',
        'middleware' => config('backpack.base.web_middleware', 'web'),
        'prefix'     => config('backpack.base.route_prefix', 'admin'),
    ],
    function () {
        // if not otherwise configured, setup the auth routes
        if (config('backpack.base.setup_auth_routes')) {
            // Authentication Routes...
            Route::get('login', 'Auth\LoginController@showLoginForm')->name('backpack.auth.login');
            Route::post('login', 'Auth\LoginController@login');
            Route::get('logout', 'Auth\LoginController@logout')->name('backpack.auth.logout');
            Route::post('logout', 'Auth\LoginController@logout');

            // Registration Routes...
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('backpack.auth.register');
            Route::post('register', 'Auth\RegisterController@register');

            // Password Reset Routes...
            Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
            Route::post('password/reset', 'Auth\ResetPasswordController@reset');
            Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
            Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');
        }

        // if not otherwise configured, setup the dashboard routes
        if (config('backpack.base.setup_dashboard_routes')) {
            Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
            Route::get('/', 'AdminController@redirect')->name('backpack');
        }

        // if not otherwise configured, setup the "my account" routes
        if (config('backpack.base.setup_my_account_routes')) {
            Route::get('edit-account-info', 'MyAccountController@getAccountInfoForm')->name('backpack.account.info');
            Route::post('edit-account-info', 'MyAccountController@postAccountInfoForm')->name('backpack.account.info.store');
            Route::post('change-password', 'MyAccountController@postChangePasswordForm')->name('backpack.account.password');
        }
    }
);


Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    Route::crud('company', 'CompanyCrudController');
    Route::crud('vihicle', 'VihicleCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('employer', 'EmployerCrudController');
    Route::crud('brand', 'BrandCrudController');
    Route::crud('driver', 'DriverCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('contract', 'ContractCrudController');
    Route::crud('customer', 'CustomerCrudController');

    Route::get('charts/new-entries', 'Charts\NewEntriesChartController@response');
    Route::get('charts/users', 'Charts\LatestUsersChartController@response');
    Route::get('charts/brands', 'Charts\LatestBrandsChartController@response');
    Route::get('charts/contracts', 'Charts\LatestContractsChartController@response');
    Route::get('charts/services', 'Charts\LatestServicesChartController@response');
    Route::get('charts/customers', 'Charts\LatestCustomersChartController@response');
    Route::get('charts/vihicles', 'Charts\LatestVihiclesChartController@response');
    Route::get('charts/drivers', 'Charts\LatestDriversChartController@response');
    Route::get('charts/companies', 'Charts\LatestCompaniesChartController@response');
    Route::get('charts/employees', 'Charts\LatestEmployeesChartController@response');
    // Route::get('charts/news', 'Charts\LatestNewsChartController@response');

    Route::crud('test', 'TestCrudController');
}); // this should be the absolute last line of this file