<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use App\Models\Contract;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Vihicle;
use App\User;
use App\Models\Driver;
use App\Models\Company;
use App\Models\Employer;
use App\Models\News;
use App\Models\Service;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class NewEntriesChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $labels = [];
        for ($days_backwards = 30; $days_backwards >= 0; $days_backwards--) {
            if ($days_backwards == 1) {
            }
            $labels[] = $days_backwards.' days ago';
        }
        $this->chart->labels($labels);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/new-entries'));

        // OPTIONAL
        $this->chart->minimalist(false);
        $this->chart->displayLegend(true);
    
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    public function data()
    {
        for ($days_backwards = 30; $days_backwards >= 0; $days_backwards--) {
            // Could also be an array_push if using an array rather than a collection.
            if(backpack_user()->hasRole('admin')) {
                $contracts[] = Contract::whereDate('created_at', today()->subDays($days_backwards))
                                ->where('company_id', backpack_user()->company_id)
                                ->count();
            }
            if(backpack_user()->hasRole('super-admin')) {
                $contracts[] = Contract::whereDate('created_at', today()->subDays($days_backwards))
                                ->count();
            }
            $brands[] = Brand::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            $vihicles[] = Vihicle::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            $services[] = Service::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            if(backpack_user()->hasRole('admin')) {
                $users[] = User::whereDate('created_at', today()->subDays($days_backwards))
                                ->where('company_id', backpack_user()->company_id)
                                ->count();
            }
            if(backpack_user()->hasRole('super-admin')) {
                $users[] = User::whereDate('created_at', today()->subDays($days_backwards))
                                ->count();
            }
            $drivers[] = Driver::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            if(backpack_user()->hasRole('admin')) {
                $employees[] = Employer::whereDate('created_at', today()->subDays($days_backwards))
                                ->where('company_id', backpack_user()->company_id)
                                ->count();
            }
            if(backpack_user()->hasRole('super-admin')) {
                $employees[] = Employer::whereDate('created_at', today()->subDays($days_backwards))
                                ->count();
            }
            $customers[] = Customer::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();
            $news[] = News::whereDate('created_at', today()->subDays($days_backwards))
                            ->count();

            if(backpack_user()->hasRole('super-admin')) {
                $companies[] = Company::whereDate('created_at', today()->subDays($days_backwards))
                                ->count();
            }
        }

        $this->chart->dataset('Users', 'line', $users)
            ->color('rgb(66, 186, 150)')
            ->backgroundColor('rgba(66, 186, 150, 0.4)');

        $this->chart->dataset('Brands', 'line', $brands)
            ->color('rgb(96, 92, 168)')
            ->backgroundColor('rgba(96, 92, 168, 0.4)');

        $this->chart->dataset('Contracts', 'line', $contracts)
            ->color('rgb(255, 0, 0)')
            ->backgroundColor('rgba(255, 0, 0, 0.4)');
            
        $this->chart->dataset('Services', 'line', $services)
            ->color('rgb(255, 193, 7)')
            ->backgroundColor('rgba(255, 193, 7, 0.4)');

        $this->chart->dataset('Customers', 'line', $customers)
            ->color('rgb(171, 87, 40)')
            ->backgroundColor('rgba(171, 87, 40, 0.4)');

        $this->chart->dataset('Vihicles', 'line', $vihicles)
            ->color('rgba(70, 127, 208, 1)')
            ->backgroundColor('rgba(70, 127, 208, 0.4)');

        $this->chart->dataset('Drivers', 'line', $drivers)
            ->color('rgb(54, 0, 0)')
            ->backgroundColor('rgba(54, 0, 0, 0.4)');

        $this->chart->dataset('Employees', 'line', $employees)
            ->color('rgb(97, 0, 98)')
            ->backgroundColor('rgba(97, 0, 98, 0.4)');

        $this->chart->dataset('News', 'line', $news)
            ->color('rgb(9, 6, 53)')
            ->backgroundColor('rgba(9, 6, 53, 0.4)');

        if(backpack_user()->hasRole('super-admin')) {
            $this->chart->dataset('Companies', 'line', $companies)
                ->color('rgb(0, 0, 0)')
                ->backgroundColor('rgba(0, 0, 0, 0.4)');
        }
    }
}
