@extends('layouts.appdashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

<!-- .row -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form class="form-group" role="search" action="{{ url('freelancer-search-project') }}" method="GET">
            <div class="input-group">
                <input type="text" id="example-input1-group2" name="search" class="form-control" placeholder="contoh : Angular JS">
                <span class="input-group-btn"><button type="submit" class="btn waves-effect waves-light btn-info"><i class="fa fa-search"></i></button></span>
            </div>
        </form>
    </div>
        @if($search != '')
        <h3 class="m-t-40">Hasil pencarian "{{ $search }}" <small>Ada {{ count($project) }} project.</small></h3>
        @endif
    
    @if(count($project) == 0)
    @else
        @foreach($project as $row)
        <div class="col-lg-4 col-sm-4">
            <div class="panel panel-info">
                <div class="panel-heading"> {{ $row->project_title }}
                    <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a> </div>
                </div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <div class="col-md-5">
                            <p>Dipost oleh : <br>
                            {{ $row->employer_name }}
                            </p>
                            <p>Budget project : <br>
                            Rp {{ number_format($row->project_budget,2,',','.') }}
                            </p>
                            <p>Waktu mulai project : <br>
                            {{ \Carbon\Carbon::parse($row->project_start_date)->format('d M Y') }}
                            </p>
                            <p>Waktu berakhir project : <br>
                            {{ \Carbon\Carbon::parse($row->project_end_date)->format('d M Y') }}
                            </p>
                        </div>
                        <div class="col-md-7 pull-right">
                            <p>{{ $row->project_detail }}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif

    
</div>

@endsection