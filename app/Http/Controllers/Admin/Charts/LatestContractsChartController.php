<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Contract;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


class LatestContractsChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        // MANDATORY. Set the labels for the dataset points
        $this->chart->labels(['6 days ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'Yesterday', 'Today']);

        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/contracts'));

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
        if(backpack_user()->hasRole('super-admin')) {
            $today_users = Contract::whereDate('created_at', today())->count();
            $yesterday_users = Contract::whereDate('created_at', today()->subDays(1))->count();
            $users_2_days_ago = Contract::whereDate('created_at', today()->subDays(2))->count();
            $users_3_days_ago = Contract::whereDate('created_at', today()->subDays(3))->count();
            $users_4_days_ago = Contract::whereDate('created_at', today()->subDays(4))->count();
            $users_5_days_ago = Contract::whereDate('created_at', today()->subDays(5))->count();
            $users_6_days_ago = Contract::whereDate('created_at', today()->subDays(6))->count();

            $this->chart->dataset('Contracts Created', 'bar', [
                $users_6_days_ago,
                $users_5_days_ago,
                $users_4_days_ago,
                $users_3_days_ago,
                $users_2_days_ago,
                $yesterday_users,
                $today_users,
            ])->color('rgb(255, 0, 0, 1)')
                ->backgroundColor('rgb(255, 0, 0, 0.4)');
        }else {
            $today_users = Contract::whereDate('created_at', today())->where('company_id', backpack_user()->company_id)->count();
            $yesterday_users = Contract::whereDate('created_at', today()->subDays(1))->where('company_id', backpack_user()->company_id)->count();
            $users_2_days_ago = Contract::whereDate('created_at', today()->subDays(2))->where('company_id', backpack_user()->company_id)->count();
            $users_3_days_ago = Contract::whereDate('created_at', today()->subDays(3))->where('company_id', backpack_user()->company_id)->count();
            $users_4_days_ago = Contract::whereDate('created_at', today()->subDays(4))->where('company_id', backpack_user()->company_id)->count();
            $users_5_days_ago = Contract::whereDate('created_at', today()->subDays(5))->where('company_id', backpack_user()->company_id)->count();
            $users_6_days_ago = Contract::whereDate('created_at', today()->subDays(6))->where('company_id', backpack_user()->company_id)->count();

            $this->chart->dataset('Contracts Created', 'bar', [
                $users_6_days_ago,
                $users_5_days_ago,
                $users_4_days_ago,
                $users_3_days_ago,
                $users_2_days_ago,
                $yesterday_users,
                $today_users,
            ])->color('rgb(255, 0, 0, 1)')
                ->backgroundColor('rgb(255, 0, 0, 0.4)');
        }
    }
}
