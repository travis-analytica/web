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

</form>

@stop
