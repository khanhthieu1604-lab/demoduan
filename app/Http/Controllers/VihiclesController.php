<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailCustomer;
use App\Models\Vihicle;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Contract;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\User;

class VihiclesController extends Controller
{
    public function vihicles($id)
    {
        $vihicleDetails = Vihicle::where('id', $id)->first();
        return view('mainview.vihicle_details', ['vihicleDetails' => $vihicleDetails]);

        // $vihicleDetails = Vihicle::where('id', $id)->get();
        // return view('mainview.vihicle_details', ['vihicleDetails' => $vihicleDetails]);
    }

    public function checkout($id)
    {

        if (Auth::check()) {

            $user_id = Auth::user()->id;

            $customer = DB::table('customers')->where('user_id', $user_id)->first();

            $vihicleDetails = Vihicle::where('id', $id)->first();

            $services = Service::where('id', $vihicleDetails->id)->first();

            if ($customer !== null) {
                return view('mainview.checkout', ['vihicleDetails' => $vihicleDetails, 'customer' => $customer, 'services' => $services]);
            } else
                return redirect()->route('confirm', [$id]);
        }

        return redirect('/login');
    }

    public function postCheckout(Request $request, $id)
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        $this->validate(
            $request,
            [
                'pickup_location' => 'required',
                'location_togo' => 'required',
                'location_dropoff_vihicle' => 'required',
                'pickup_time' => 'required',
                'dropoff_time' => 'required',
            ],
            [
                'pickup_location.required' => 'Please input location you want to pick up',
                'location_togo.required' => 'Please input location you want to arrive',
                'pickup_time.required' => 'Please choose pick-up time',
                'dropoff_time.required' => 'Please choose drop-off time',
            ]
        );

        $data = new Contract;

        $data->vihicle_id = $id;
        $data->customer_id = $request->customer_id;
        $data->company_id =  $request->company_id;
        $data->driver_status = $request->driver_status;
        $data->pickup_location = $request->pickup_location;
        $data->location_togo = $request->location_togo;
        $data->location_dropoff_vihicle = $request->location_dropoff_vihicle;

        $data->pickup_time = $request->get('pickup_time');
        $data->dropoff_time = $request->get('dropoff_time');

        $data->driver_status = $request->driver_status;

        $mail_customer = Auth::user()->email;
        $data->save();

        Mail::to($mail_customer)->send(new SendMailCustomer($data));
        
        return view('mainview.success')->with(compact('userinfo', 'customer'));
    }


    public function getConfirm($id)
    {
        return view('mainview.confirm', ['id' => $id]);
    }

    public function postConfirm(Request $request, $id)
    {
        $userinfo = User::where('id', Auth::user()->id)->first();
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        $this->validate(
            $request,
            [
                'address' => 'required',
                'driver_license' => 'required',
                'id_card' => 'required|digits:9',
                'phone_number' => 'required|numeric|digits_between:10,11',
                'images' => 'required',
                'id_image_f' => 'required',
                'id_image_b' => 'required'
            ],
            [
                'address.required' => 'Please input your address',
                'driver_license.required' => 'Please input your driver license',
                'id_card.required' => 'Please input your id card',
                'phone_number.required' => 'Please input your phone number',
                'images' => 'Please input your Personal Image',
                'id_image_f' => 'Please input your ID Image (Front)',
                'id_image_b' => 'Please input your ID Image (Behind)'
            ]
        );

        if ($request->isMethod('post')) {
            $data = $request->all();

            $customer = new Customer;
            $customer->address = $data['address'];
            $customer->phone_number = $data['phone_number'];
            $customer->driver_license = $data['driver_license'];
            $customer->id_card = $data['id_card'];
            $customer->passport = $data['passport'];
            $customer->user_id = Auth::user()->id;
            $customer->customer_status = 'Verifying';

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
            return redirect($id . '/checkout')->with('flash_message_success', 'Profile has been added successfully!');
        }
    }
}
