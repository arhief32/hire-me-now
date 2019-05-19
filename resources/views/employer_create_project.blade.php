@extends('layouts.appdashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<!--.row-->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            @if(isset($error))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> {{$error}} 
            </div>
            @elseif(isset($success))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> {{$success}} 
            </div>
            @endif
            
            <form data-toggle="validator" action="{{url('employer-create-project')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="input-project-title" class="control-label">Project Title</label>
                    <input type="text" name="project_title" class="form-control" id="input-project-title" placeholder="Project title" 
                        value="{{ isset($project_title) ? $project_title : '' }}" required>
                </div>
                <div class="form-group">
                    <label for="input-project-detail" class="control-label">Project Detail</label>
                    <textarea name="project_detail" id="input-project-detail" class="form-control" rows="5" placeholder="Project detail" 
                        value="{{ isset($project_detail) ? $project_detail : '' }}" required></textarea>
                    <span class="help-block with-errors">*Jelaskan project anda secara rinci</span>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="input-start-date" class="control-label">Start Date</label>
                            <fieldset id="fieldset-start-date">
                                <div class="row">
                                    <div class="radio">
                                        <input type="radio" name="project_start_date" value="{{date('Y-m-d')}}" id="radio-start-date-today" checked>
                                        <label for="radio-start-date-today"> Current date</label>
                                    </div>
                                    <div class="radio radio-custom">
                                        <input type="radio" name="project_start_date" id="radio-start-date-custom">
                                        <label for="radio-start-date-custom"> Custom date</label>
                                    </div>
                                    <input type="input" name="project_start_date" class="form-control" id="input-start-date" value="{{date('Y-m-d')}}" placeholder="Start date" disabled>
                                    <span class="help-block with-errors">*Input tanggalnya</span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group col-sm-6">
                            <label name="project_end_date" for="input-end-date" class="control-label">End Date</label>
                            <fieldset id="fieldset-end-date">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                        <div class="radio">
                                            <input type="radio" name="project_end_date" value="{{date('Y-m-d', strtotime('now +3 days'))}}" id="radio-end-date-3-days" checked>
                                            <label for="id-radio-end-date-3-days"> 3 days</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="project_end_date" value="{{date('Y-m-d', strtotime('now +7 days'))}}" id="radio-end-date-1-week">
                                            <label for="radio-end-date-1-week"> 1 week</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                        <div class="radio">
                                            <input type="radio" name="project_end_date" value="{{date('Y-m-d', strtotime('now +1 month'))}}" id="radio-end-date-1-month">
                                            <label for="radio-end-date-1-month"> 1 month</label>
                                        </div>
                                        <div class="radio radio-custom">
                                            <input type="radio" name="project_end_date" id="radio-end-date-custom">
                                            <label for="radio-end-date-custom"> Custom date</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <input type="input" name="project_end_date" class="form-control" id="input-end-date" value="{{date('Y-m-d', strtotime('now +3 days'))}}" placeholder="End date" disabled>
                            <span class="help-block with-errors">*Input tanggalnya</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-project-budget" class="control-label">Project Budget</label>
                    <input type="number" name="project_budget" class="form-control" id="input-project-budget" placeholder="Project budget" min="50000" max="1000000000" 
                        value="{{ isset($project_title) ? $project_title : '' }}" required/>
                </div>
                <div class="form-group">
                    <button type="submit" id="submit-create-project" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#radio-start-date-today').click(function(){
        $('#input-start-date').val('{{date("Y-m-d")}}')

        $('#input-start-date').removeAttr('required')
        $('#input-start-date').prop('disabled',true)
    })
    $('#radio-start-date-custom').click(function(){
        $('#input-start-date').removeAttr('disabled')
        $('#input-start-date').prop('required',true)
        $('#input-start-date').datepicker({
            dateFormat: 'yy-mm-dd'
        })
    })
    $('#input-start-date').click(function(){
        $('#input-start-date').datepicker({
            dateFormat: 'yy-mm-dd'
        })
    })
    

    $('#radio-end-date-3-days').click(function(){
        $('#input-end-date').val('{{date("Y-m-d", strtotime("now +3 days"))}}')
        
        $('#input-end-date').removeAttr('required')
        $('#input-end-date').prop('disabled',true)
    })
    $('#radio-end-date-1-week').click(function(){
        $('#input-end-date').val('{{date("Y-m-d", strtotime("now +7 days"))}}')

        $('#input-end-date').removeAttr('required')
        $('#input-end-date').prop('disabled',true)
    })
    $('#radio-end-date-1-month').click(function(){
        $('#input-end-date').val('{{date("Y-m-d", strtotime("now +1 month"))}}')

        $('#input-end-date').removeAttr('required')
        $('#input-end-date').prop('disabled',true)
    })
    $('#radio-end-date-custom').click(function(){
        $('#input-end-date').removeAttr('disabled')
        $('#input-end-date').prop('required',true)
        $('#input-end-date').datepicker({
            dateFormat: 'yy-mm-dd'
        })
    })
    $('#input-end-date').click(function(){
        $('#input-end-date').datepicker({
            dateFormat: 'yy-mm-dd'
        })
    })
})
</script>

@endsection