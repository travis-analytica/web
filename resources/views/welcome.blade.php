@extends('layouts.app')

@section('content')

<br><br>
<h1 class="text-center">Welcome</h1>

<div class="row">
    <div class="col-sm-10 offset-sm-1">
    <h2>
        Auditor Scraper Progress
        <small class="text-muted">({{ $progress }}%)</small>
    </h2>
        <div class="progress">
            <div
                class="progress-bar progress-bar-striped progress-bar-animated"
                role="progressbar"
                style="width: {{ $progress }}%"
                aria-valuenow="{{ $progress }}"
                aria-valuemin="0"
                aria-valuemax="100"
            ></div>
        </div>
    </div>
</div>

@stop
