@extends('layouts.app')

@section('content')

<div class="col-sm-8 offset-sm-2">
    @if($case->status == 1)
        <h4><span class="badge badge-danger float-right p-2 mt-2">Closed</span></h4>
    @else
        <h4><span class="badge badge-success float-right p-2 mt-2">Open</span></h4>
    @endif

    <h1>{{ $case->case_number }}</h1>
</div>

@stop