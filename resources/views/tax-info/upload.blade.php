@extends('layouts.app')

@section('content')

<h1>
    Tax Information
    <span class="text-muted font-weight-bold">&#8250;</span>
    Upload
</h1>

<form class="" action="{{ route('tax-info.parcel-id.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <textarea class="form-control" name="parcel-list" rows="20" placeholder="Paste the Parcel ID column here" autofocus></textarea>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-6 offset-3">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <br><br>
                    <a href="{{ route('tax-info.index') }}" class="btn btn-outline-secondary btn-block">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <div id="cover" class="d-none">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-6 mx-auto text-center font-weight-light text-uppercase text-white">
                    <h1 class="font-weight-light">Uploading data</h1>
                    <h5 class="font-weight-light">This may take a couple minutes</h5>
                    <div class="loader"></div>
                </div>
            </div>
        </div>
    </div>

</form>

<script>
    document.getElementsByTagName('form')[0].addEventListener('submit', function(e){
        document.querySelector('#cover').classList.remove('d-none');
    });
</script>

@stop
