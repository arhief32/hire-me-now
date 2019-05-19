<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Employer;
use App\Freelancer;

class ProjectController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $freelancer = Freelancer::where('user_id', Auth::id())->first();
        if($freelancer == null)
        {
            return redirect('freelancer-register');
        }
        
        // dd($request->search);
        if(isset($request->search))
        {
            $project = Project::select('project.*','employer.*')
            ->where([
                ['project.project_title', 'LIKE' , '%'.$request->search.'%'],
                ['project.winner_id', 0],
            ])
            ->join('employer','project.employer_id','=','employer.id')
            ->orderBy('project.created_at', 'DESC')
            ->get();
        }else {
            $project = Project::select('project.*','employer.*')
            ->where('winner_id', 0)
            ->join('employer','project.employer_id','=','employer.id')            
            ->orderBy('project.created_at', 'DESC')
            ->get();
        }

        $search = $request->search;
        $title = 'Search Project';
        return view('freelancer_search_project',[
            'title' => $title,
            'freelancer' => $freelancer,
            'project' => $project,
            'search' => $search,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employer = Employer::where('user_id', Auth::id())->first();
        if($employer == null)
        {
            return redirect('employer-register');
        }
        $title = 'Create Project';
        return view('employer_create_project', [
            'title' => $title,
            'employer' => $employer,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Create Project';
        $employer = Employer::where('user_id', Auth::id())->first();
        
        $project_title = $request->project_title;
        $project_detail = $request->project_detail;
        $project_start_date = $request->project_start_date;
        $project_end_date = $request->project_end_date;
        $project_budget = $request->project_budget;
        $winner_id = 0;
        $winner_price = 0;
        $project_paid = 0;
        // dd($request->all());
        if($project_end_date < $project_start_date)
        {
            $error = 'Waktu berakhirnya project lebih cepat daripada waktu memulai project';
            return view('employer_create_project',[
                'title' => $title,
                'employer' => $employer,
                'error' => $error,
                'project_title' => $project_title,
                'project_detail' => $project_detail,
                'project_budget' => $project_budget,
            ]);
        }

        $insert_project = new Project;
        $insert_project->employer_id = Auth::id();
        $insert_project->project_title = $project_title;
        $insert_project->project_detail = $project_detail;
        $insert_project->project_start_date = $project_start_date;
        $insert_project->project_end_date = $project_end_date;
        $insert_project->project_budget = $project_budget;
        $insert_project->winner_id = $winner_id;
        $insert_project->winner_price = $winner_price;
        $insert_project->project_paid = $project_paid;
        $insert_project->save();

        $success = 'Project anda telah sukses ditambahkan di sistem kami';
        return view('employer_create_project', [
            'title' => $title,
            'employer' => $employer,
            'success' => $success,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
