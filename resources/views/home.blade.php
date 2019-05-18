@extends('layouts.appdashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row py-5">
        <!-- ============================================================== -->
        <!-- Freelancer -->
        <!-- ============================================================== -->
        <div class="col-md-6">
            <div class="card p-2 mr-1">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h2 class="text-dark font-weight-medium">Freelancer</h2>
                        <h4 class="text-success">Free Forever</h4>
                    </div>
                    <div class="live-box text-center mt-4">
                        <a href="{{url('freelancer-register')}}">
                            <img href="{{url('freelancer-register')}}" class="img-fluid" src="{{ url('img/freelancer.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Employer -->
        <!-- ============================================================== -->
        <div class="col-md-6">
            <div class="card p-2 mr-1">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h2 class="text-dark font-weight-medium">Employer</h2>
                        <h4 class="text-success">Free Forever</h4>
                    </div>
                    <div class="live-box text-center mt-4">
                        <a href="{{url('employer-register')}}">
                            <img href="{{url('employer-register')}}" class="img-fluid" src="{{ url('img/employer.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
