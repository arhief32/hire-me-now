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
                    <!-- <form> -->
                    <form action="{{ url('freelancer-register') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="input-freelancer-name">Freelancer Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="input-freelancer-name" name="freelancer_name" placeholder="Freelancer name" value="{{Auth::user()->name}}" disabled></div>
                        </div>
                        <div class="form-group">
                            <label for="input-freelacer-location">Location</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>
                                    <select class="form-control" id="input-freelancer-location-province" name="freelancer_location_province" placeholder="Select your Province">
                                        <option value="31">--Select your Province--</option>
                                    </select>
                                    <select class="form-control" id="input-freelancer-location-city" name="freelancer_location_city" placeholder="Select your City" disabled>
                                        <option>--Select your City--</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-freelancer-photo">Freelancer Photo</label>
                            <input type="file" id="input-freelancer-photo" name="freelancer_photo" class="dropify" />
                        </div>
                        <div class="form-group">
                            <label for="input-short-description">Short Description</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-circle-o"></i></div>
                                <input type="text" class="form-control" id="input-short-description" name="short_description" placeholder="Short Description"> </div>
                        </div>
                        <div class="form-group">
                            <label for="input-long-description">Long Description</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                <textarea type="text" class="form-control" id="input-long-description" name="long_description" placeholder="Long Description" rows="5"></textarea></div>
                        </div>
                        <button type="submit" id="btn-submit-freelancer" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('dist/js/dropify.min.js') }}"></script>
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
                $('#input-freelancer-location-city option:last').after('<option value="'+ value.nama +'">'+ value.nama +'</option>');
            })
        })
    })

    /**
     * DROPIFY
     */
    // Basic
    $('.dropify').dropify();
    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove:  'Supprimer',
            error:   'Désolé, le fichier trop volumineux'
        }
    });
    // Used events
    var drEvent = $('#input-file-events').dropify();
    drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    drEvent.on('dropify.afterClear', function(event, element){
        alert('File deleted');
    });
    drEvent.on('dropify.errors', function(event, element){
        console.log('Has Errors');
    });
    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e){
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })
})
</script>

@endsection