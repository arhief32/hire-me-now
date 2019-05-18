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
            <form data-toggle="validator">
                <div class="form-group">
                    <label for="input-project-title" class="control-label">Project Title</label>
                    <input type="text" class="form-control" id="input-project-title" placeholder="Project title" required>
                </div>
                <div class="form-group">
                    <label for="input-project-detail" class="control-label">Project Detail</label>
                    <textarea id="input-project-detail" class="form-control" rows="5" placeholder="Project title" required></textarea>
                    <span class="help-block with-errors">*Jelaskan project anda secara rinci</span>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="input-start-date" class="control-label">Start Date</label>
                            <fieldset id="fieldset-start-date">
                                <div class="row">
                                    <div class="radio">
                                        <input type="radio" name="radio-start-date" id="radio-start-date-today" checked>
                                        <label for="radio-start-date-today"> Current date</label>
                                    </div>
                                    <div class="radio radio-custom">
                                        <input type="radio" name="radio-start-date" id="radio-start-date-custom">
                                        <label for="radio-start-date-custom"> Custom date</label>
                                    </div>
                                    <input type="text" class="form-control" id="input-start-date" placeholder="Start date" disabled>
                                    <span class="help-block with-errors">*Input tanggalnya</span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="input-end-date" class="control-label">End Date</label>
                            <fieldset id="fieldset-end-date">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                        <div class="radio">
                                            <input type="radio" name="radio-end-date" id="radio-end-date-3-days" checked>
                                            <label for="id-radio-end-date-3-days"> 3 days</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="radio-end-date" id="radio-end-date-1-week">
                                            <label for="radio-end-date-1-week"> 1 week</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                        <div class="radio">
                                            <input type="radio" name="radio-end-date" id="radio-end-date-1-month">
                                            <label for="radio-end-date-1-month"> 1 month</label>
                                        </div>
                                        <div class="radio radio-custom">
                                            <input type="radio" name="radio-end-date" id="radio-end-date-custom">
                                            <label for="radio-end-date-custom"> Custom date</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <input type="text" class="form-control" id="input-end-date" placeholder="End date" disabled>
                            <span class="help-block with-errors">*Input tanggalnya</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-project-budget" class="control-label">Project Budget</label>
                    <input type="number" class="form-control" id="input-project-budget" placeholder="Project budget" min="50000" max="1000000000" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#radio-start-date-today').click(function(){
        $('#input-start-date').removeAttr('required')
        $('#input-start-date').prop('disabled',true)
    })
    $('#radio-start-date-custom').click(function(){
        $('#input-start-date').removeAttr('disabled')
        $('#input-start-date').prop('required',true)
    })

    $('#radio-end-date-3-days').click(function(){
        $('#input-end-date').removeAttr('required')
        $('#input-end-date').prop('disabled',true)
    })
    $('#radio-end-date-1-week').click(function(){
        $('#input-end-date').removeAttr('required')
        $('#input-end-date').prop('disabled',true)
    })
    $('#radio-end-date-1-month').click(function(){
        $('#input-end-date').removeAttr('required')
        $('#input-end-date').prop('disabled',true)
    })
    $('#radio-end-date-custom').click(function(){
        $('#input-end-date').removeAttr('disabled')
        $('#input-end-date').prop('required',true)
    })
})
</script>

@endsection