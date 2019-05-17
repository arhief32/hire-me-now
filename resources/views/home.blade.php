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
                        <img class="img-fluid" src="{{ url('img/freelancer.png') }}">
                    </div>
                    <div class="text-center mt-4 mb-3">
                        <a href="{{url('register-freelancer')}}" class="btn btn-custom btn-outline-info btn-lg" target="_blank">Login as freelancer!</a>
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
                        <img class="img-fluid" src="{{ url('img/employer.png') }}">
                    </div>
                    <div class="text-center mt-4 mb-3">
                        <a href="#" class="btn btn-custom btn-outline-info btn-lg" target="_blank">Login as employer!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
