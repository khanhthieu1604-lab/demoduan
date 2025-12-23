<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function edit(Request $request, $id = null)
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $contracts = Contract::where('id', $id)->get();

        Contract::where('id', $id)->where('contract_status', 'Deposited')->update(['contract_status' => 'Cancel']);
        Contract::where('id', $id)->where('contract_status', 'Rentaling')->update(['contract_status' => 'Return']);
        Contract::where('id', $id)->where('contract_status', 'Verifying')->update(['contract_status' => 'Cancel']);
        Contract::where('id', $id)->where('contract_status', 'Deposit')->update(['contract_status' => 'Deposited']);
        Contract::where('id', $id)->where('contract_status', 'Delivery')->update(['contract_status' => 'Cancel']);

        return redirect('/user-rentaling');

        return view('auth.user_rentaling')->with(compact('userinfo', 'customer', 'contracts'));
    }

    public function cancel(Request $request, $id = null)
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $contracts = Contract::where('id', $id)->get();

        Contract::where('id', $id)->update(['contract_status' => 'Cancel']);

        return redirect('/user-rentaling');

        return view('auth.user_rentaling')->with(compact('userinfo', 'customer', 'contracts'));
    }
}
