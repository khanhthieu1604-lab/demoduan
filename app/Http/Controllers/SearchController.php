<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vihicle;

use App\Models\Company;


class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        $vihicles = Vihicle::where('vihicles.vihicle_name', 'like', '%' . $request->key . '%')
            ->where('vihicle_status', '<>', 'Deposited')
            ->where('vihicle_status', '<>', 'Rentaled')
            ->where('vihicle_status', '<>', 'Checking')
            ->where('vihicle_status', '<>', 'Broken')
            ->join('companies', 'vihicles.company_id', '=', 'companies.id')
            ->select('vihicles.*', 'companies.address_number', 'companies.address_ward', 'companies.address_district', 'companies.address_city', 'companies.address_country')
            ->orWhere('companies.address_number', 'like', '%' . $request->key . '%')
            ->orWhere('companies.address_ward', 'like', '%' . $request->key . '%')
            ->orWhere('companies.address_district', 'like', '%' . $request->key . '%')
            ->orWhere('companies.address_city', 'like', '%' . $request->key . '%')
            ->orWhere('companies.address_country', 'like', '%' . $request->key . '%')
            ->paginate(8);

        $companies = Company::get();

        // $companies = Company::Where('companies.address_number', 'like', '%' . $request->key . '%')
        //     ->orWhere('companies.address_ward', 'like', '%' . $request->key . '%')
        //     ->orWhere('companies.address_district', 'like', '%' . $request->key . '%')
        //     ->orWhere('companies.address_city', 'like', '%' . $request->key . '%')
        //     ->orWhere('companies.address_country', 'like', '%' . $request->key . '%')
        //     ->paginate(8);

        return view('mainview.search', ['vihicles' => $vihicles, 'companies' => $companies]);
    }
}
