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
        $title = 'Dashboard Freelancer';
        return view('dashboard_freelancer', [
            'title' => $title
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
            
        }

    }

    public function registerFreelancer(Request $request)
    {
        $user_id = Auth::id();
        $freelancer_name = $request->freelancer_name;
        $freelancer_location = $request->freelancer_location;
        $freelancer_photo = $request->freelancer_photo;
        $short_description = $request->short_description;
        $long_description = $request->long_description;
        $freelancer_point = 0;
        $freelancer_status = 1;

        
    }
}
