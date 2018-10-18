@extends('layouts.app')

@section('content')

<h1>
    Tax Information
    <span class="text-muted font-weight-bold">&#8250;</span>
    Export
</h1>

@foreach($files as $file)

    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <a href="{{ route('tax-info.export.index.download', $file->id) }}" class="btn btn-outline-primary btn-sm float-right">Download</a>
            <img class="mr-2 pt-2 pb-1 float-left" src="{{ asset('img/csv-icon.png') }}" alt="" height="46">
            <h4 class="mb-0">
                Batch #{{ $file->batch_id }} Export
            </h4>
            <small class="text-muted">Export finished {{ $file->export_date }}</small>
        </div>
    </div>

@endforeach

@stop
