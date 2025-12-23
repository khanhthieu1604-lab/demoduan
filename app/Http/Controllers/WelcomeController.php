<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vihicle;
use App\Models\Company;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('mainview.welcome');
    }

    public function toren()
    {
        // $vihicles = Vihicle::where('vihicle_status', '<>', 'Rentaling')->where('vihicle_status', '<>', 'Broken')->paginate(8);
        $vihicles = Vihicle::paginate(8);
        $companies = Company::get();
        return view('mainview.index', ['vihicles' => $vihicles, 'companies' => $companies]);
    }
}
