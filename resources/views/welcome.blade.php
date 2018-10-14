@extends('layouts.app')

@section('content')

<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm border-danger">
        <div class="card-header bg-danger">
            <h4 class="my-0 font-weight-normal text-white">Municipal Court</h4>
        </div>
        <div class="card-body text-muted">
            <h1 class="card-title">N/A</h1>
            <h4>Court Case scraper needs to be rewritten</h4>
        </div>
    </div>
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Tax Delinquency Info</h4>
        </div>
        <div class="card-body">
            <h4>Batch #{{$latestBatch}} of Parcel IDs has been imported</h4>
            <h5>
                @if($percentScraped < 100)
                    Auditor site scraper is running
                @else
                    <span class="text-success">All data has been collected</span>
                @endif
            </h5>
            @if($percentScraped < 100)
            <div class="col-10 offset-1 mt-4 mb-3">
                <hr>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$percentScraped}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentScraped}}%"></div>
                </div>
                <p>{{$percentScraped}}% Complete</p>
            </div>
            @endif
        </div>
    </div>
</div>

@stop
