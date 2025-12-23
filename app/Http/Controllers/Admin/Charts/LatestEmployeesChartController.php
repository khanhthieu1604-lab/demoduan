<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Employer;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


class LatestEmployeesChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels(['6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'Yesterday', 'Today']);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/employees'));

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
        $today_users = Employer::whereDate('created_at', today())->count();
        $yesterday_users = Employer::whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago = Employer::whereDate('created_at', today()->subDays(2))->count();
        $users_3_days_ago = Employer::whereDate('created_at', today()->subDays(3))->count();
        $users_4_days_ago = Employer::whereDate('created_at', today()->subDays(4))->count();
        $users_5_days_ago = Employer::whereDate('created_at', today()->subDays(5))->count();
        $users_6_days_ago = Employer::whereDate('created_at', today()->subDays(6))->count();

        $this->chart->dataset('Employees Created', 'bar', [
            $users_6_days_ago,
            $users_5_days_ago,
            $users_4_days_ago,
            $users_3_days_ago,
            $users_2_days_ago,
            $yesterday_users,
            $today_users,
        ])->color('rgb(97, 0, 98, 1)')
            ->backgroundColor('rgb(97, 0, 98, 0.4)');
    }
}
