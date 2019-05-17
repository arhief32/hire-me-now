@extends('layouts.appdashboard')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form>
                        <div class="form-group">
                            <label for="input-freelancer-name">Freelancer Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="input-freelancer-name" placeholder="Freelancer name" value="{{ Auth::user()->name }}" disabled></div>
                        </div>
                        <div class="form-group">
                            <label for="input-freelacer-location">Location</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                                    <select class="form-control" id="input-freelancer-location-province" placeholder="Select your Province">
                                        <option value="31">--Select your Province--</option>
                                    </select>
                                    <select class="form-control" id="input-freelancer-location-city"  placeholder="Select your City" disabled>
                                        <option>--Select your City--</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-short-description">Short Description</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                <input type="text" class="form-control" id="input-short-description" placeholder="Short Description"> </div>
                        </div>
                        <div class="form-group">
                            <label for="input-long-description">Long Description</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                <textarea type="text" class="form-control" id="input-long-description" placeholder="Long Description" rows="5"></textarea></div>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "{{ url('api/get-list-daerah') }}/all",
        "method": "GET",
        "headers": {
            "cache-control": "no-cache",
            "Postman-Token": "caf8d7f1-980b-467c-83f9-4bdbab43366f"
        }
    }

    $.ajax(settings).done(function (response) {
        // console.log(response.semuaprovinsi)
        $.each(response.semuaprovinsi, function (index, value) {
            $('#input-freelancer-location-province option:last').after('<option value="'+ value.id +'">'+ value.nama +'</option>');
        })
    })
    
    $('#input-freelancer-location-province').click(function(){
        $('#input-freelancer-location-city').removeAttr("disabled")
        $('#input-freelancer-location-city').empty()
        $('#input-freelancer-location-city').append('<option value="0">--Select your City--</option>')

        var value = $('#input-freelancer-location-province').val()
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "{{ url('api/get-list-daerah') }}/" + value,
            "method": "GET",
            "headers": {
                "cache-control": "no-cache",
                "Postman-Token": "caf8d7f1-980b-467c-83f9-4bdbab43366f"
            }
        }
        
        $.ajax(settings).done(function (response) {
            // console.log(response.kabupatens)
            $.each(response.kabupatens, function (index, value) {
                $('#input-freelancer-location-city option:last').after('<option value="'+ value.id +'">'+ value.nama +'</option>');
            })
        })
    })
})
</script>
@endsection