<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Employer;

class EmployerController extends Controller
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

    public function dashboardEmployer()
    {
        $employer = Employer::where('user_id', Auth::id())->first();
                
        if($employer == null)
        {
            return redirect('employer-register');
        }

        $title = 'Dashboard Employer';
        return view('employer_dashboard', [
            'title' => $title,
            'employer' => $employer,
        ]);
    }

    public function registerEmployerPage()
    {
        $check_employer_account = Employer::where('user_id', Auth::id())->first();

        if($check_employer_account == null)
        {
            $title = 'Register Employer';
            return view('employer_register', [
                'title' => $title,
            ]);
        } else {
            return redirect('employer-dashboard');
        }
    }

    public function registerEmployer(Request $request)
    {
        $this->validate($request, [
            'employer_location_province' => 'required',
            'employer_location_city' => 'required',
            'employer_photo' => 'required',
        ]);
        
        $user_id = Auth::id();
        $employer_name = Auth::user()->name;
        $employer_location_province = file_get_contents(url('api/get-list-daerah/all'));
        $employer_location_province = json_decode($employer_location_province);
        $employer_location_province = $employer_location_province->semuaprovinsi;
        foreach($employer_location_province as $row)
        {
            if($row->id == $request->employer_location_province)
            {
                $employer_location_province = $row->nama;
            }
        }
        $employer_location = $request->employer_location_city.', '.$employer_location_province;
        $employer_photo = $request->file('employer_photo');
        
        $employer_status = 1;

        $insert_employer = new Employer;
        $insert_employer->user_id = $user_id;
        $insert_employer->employer_name = $employer_name;
        $insert_employer->employer_location = $employer_location;
        $insert_employer->employer_photo = $user_id.'.'.$employer_photo->getClientOriginalExtension();
        $insert_employer->employer_status = $employer_status;
        $insert_employer->save();
        
        $employer_photo->move(public_path('img/image_employer'), $user_id.'.'.$employer_photo->getClientOriginalExtension());
        
        return redirect('employer-dashboard');
    }

    public function getProfile()
    {
        $employer = Employer::where('user_id', Auth::id())->first();
        $title = 'Profile';

        return view('employer_profile', [
            'title' => $title,
            'employer' => $employer,
        ]);
    }

    public function searchFreelancerPage()
    {
        $employer = Employer::where('user_id', Auth::id())->first();
                
        if($employer == null)
        {
            return redirect('employer-register');
        }

        $title = 'Search Project';
        return view('employer_search_freelancer',[
            'title' => $title,
            'employer' => $employer,
        ]);
    }
}
