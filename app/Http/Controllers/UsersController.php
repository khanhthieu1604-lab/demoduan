<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Vihicle;
use App\Models\Customer;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function userInfos()
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        return view('auth.user_info')->with(compact('userinfo', 'customer'));
    }

    public function addInfo(Request $request)
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        if ($request->isMethod('post')) {
            $data = $request->all();

            $customer = new Customer;
            $customer->address = $data['address'];
            $customer->phone_number = $data['phone_number'];
            $customer->driver_license = $data['driver_license'];
            $customer->id_card = $data['id_card'];
            $customer->passport = $data['passport'];
            $customer->user_id = Auth::user()->id;

            //Upload user image
            if ($request->hasFile('images')) {
                echo $img_tmp = $request->images;
                if ($img_tmp->isValid()) {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $img_path = 'userimages/' . $filename;

                    //imageresize
                    Image::make($img_tmp)->resize(500, 500)->save($img_path);

                    $customer->images = $filename;
                }
            }
            //Upload id front image
            if ($request->hasFile('id_image_f')) {
                echo $img_tmp1 = $request->id_image_f;
                if ($img_tmp1->isValid()) {
                    $extension = $img_tmp1->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $img_path1 = 'idimages/' . $filename;

                    //imageresize
                    Image::make($img_tmp1)->resize(500, 500)->save($img_path1);

                    $customer->id_image_f = $filename;
                }
            }
            //Upload id behind image
            if ($request->hasFile('id_image_b')) {
                echo $img_tmp2 = $request->id_image_b;
                if ($img_tmp2->isValid()) {
                    $extension = $img_tmp2->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $img_path2 = 'idimages/' . $filename;

                    //imageresize
                    Image::make($img_tmp2)->resize(500, 500)->save($img_path2);

                    $customer->id_image_b = $filename;
                }
            }
            $customer->save();
            return redirect('/user-info')->with('flash_message_success', 'Profile has been added successfully!');
        }
        return view('auth.add_info')->with(compact('userinfo', 'customer'));
    }

    public function editInfo(Request $request, $id = null)
    {
        $user_id = Auth::user()->id;
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        if ($request->isMethod('post')) {
            $data = $request->all();
            //edit user image
            if ($request->hasFile('images')) {
                echo $img_tmp = $request->images;
                //image path code
                if ($img_tmp->isValid()) {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $img_path = 'userimages/' . $filename;

                    //imageresize
                    Image::make($img_tmp)->resize(500, 500)->save($img_path);
                }
            } else {
                $filename = $data['current_image'];
            }
            //edit id front image
            if ($request->hasFile('id_image_f')) {
                echo $img_tmp1 = $request->id_image_f;
                //image path code
                if ($img_tmp1->isValid()) {
                    $extension = $img_tmp1->getClientOriginalExtension();
                    $filename1 = rand(111, 99999) . '.' . $extension;
                    $img_path1 = 'idimages/' . $filename1;

                    //imageresize
                    Image::make($img_tmp1)->resize(500, 500)->save($img_path1);
                }
            } else {
                $filename1 = $data['current_image1'];
            }
            //edit id behind image
            if ($request->hasFile('id_image_b')) {
                echo $img_tmp2 = $request->id_image_b;
                //image path code
                if ($img_tmp2->isValid()) {
                    $extension = $img_tmp2->getClientOriginalExtension();
                    $filename2 = rand(111, 99999) . '.' . $extension;
                    $img_path2 = 'idimages/' . $filename2;

                    //imageresize
                    Image::make($img_tmp2)->resize(500, 500)->save($img_path2);
                }
            } else {
                $filename2 = $data['current_image2'];
            }

            Customer::where(['id' => $id])->update([
                'address' => $data['address'],
                'phone_number' => $data['phone_number'],
                'driver_license' => $data['driver_license'],
                'id_card' => $data['id_card'],
                'passport' => $data['passport'],
                'images' => $filename,
                'id_image_f' => $filename1,
                'id_image_b' => $filename2
            ]);
            return redirect('/user-info')->with('flash_message_success', "Info has been edited!");
        }
        $customer = DB::table('customers')->where('user_id', $user_id)->first();

        return view('auth.edit_info')->with(compact('userinfo', 'customer'));
    }

    public function logout()
    {
        Session::forget('frontSession');
        Auth::logout();
        return redirect('/to-ren');
    }

    public function history($id = null)
    {

        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $contracts = Contract::where('contract_status', 'Finish')->get();
        return view('auth.user_history')->with(compact('userinfo', 'customer', 'contracts'));
    }

    public function rentaling($id = null)
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $contracts = Contract::where('customer_id', $customer->id)->where('contract_status', '<>', 'Finish')->get();

        return view('auth.user_rentaling')->with(compact('userinfo', 'customer', 'contracts'));
    }
}
