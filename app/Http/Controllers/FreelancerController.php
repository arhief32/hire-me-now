<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Freelancer;

class FreelancerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardFreelancer()
    {
        $freelancer = Freelancer::where('user_id', Auth::id())->first();
        
        if($freelancer == null)
        {
            return redirect('freelancer-register');
        }

        $title = 'Dashboard Freelancer';
        return view('dashboard_freelancer', [
            'title' => $title,
            'freelancer' => $freelancer,
        ]);
    }

    public function registerFreelancerPage()
    {
        $check_freelancer_account = Freelancer::where('user_id', Auth::id())->first();

        if($check_freelancer_account == null)
        {
            $title = 'Register Freelancer';
            return view('register_freelancer', [
                'title' => $title,
            ]);
        } else {
            return redirect('freelancer-dashboard');
        }

    }

    public function registerFreelancer(Request $request)
    {
        $this->validate($request, [
            'freelancer_location_province' => 'required',
            'freelancer_location_city' => 'required',
            'freelancer_photo' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);
        
        $user_id = Auth::id();
        $freelancer_name = Auth::user()->name;
        $freelancer_location_province = file_get_contents(url('api/get-list-daerah/all'));
        $freelancer_location_province = json_decode($freelancer_location_province);
        $freelancer_location_province = $freelancer_location_province->semuaprovinsi;
        foreach($freelancer_location_province as $row)
        {
            if($row->id == $request->freelancer_location_province)
            {
                $freelancer_location_province = $row->nama;
            }
        }
        $freelancer_location = $request->freelancer_location_city.', '.$freelancer_location_province;
        $freelancer_photo = $request->file('freelancer_photo');
        
        $short_description = $request->short_description;
        $long_description = $request->long_description;
        $freelancer_point = 0;
        $freelancer_status = 1;

        $insert_freelancer = new Freelancer;
        $insert_freelancer->user_id = $user_id;
        $insert_freelancer->freelancer_name = $freelancer_name;
        $insert_freelancer->freelancer_location = $freelancer_location;
        $insert_freelancer->freelancer_photo = $user_id;
        $insert_freelancer->short_description = $short_description;
        $insert_freelancer->long_description = $long_description;
        $insert_freelancer->freelancer_point = $freelancer_point;
        $insert_freelancer->freelancer_status = $freelancer_status;
        $insert_freelancer->save();
        
        $freelancer_photo->move(public_path('img/image_freelancer'), $user_id.'.'.$freelancer_photo->getClientOriginalExtension());
        
        return redirect('freelancer-dashboard');
    }
}
