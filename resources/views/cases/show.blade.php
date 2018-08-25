@extends('layouts.app')

@section('content')

<div class="col-sm-8 offset-sm-2">


    @if($case->status == 1)
        <h4><span class="bg-danger text-white text-center p-2 mt-2 d-block d-sm-inline float-sm-right">Closed</span></h4>
    @else
        <h4><span class="bg-success text-white text-center p-2 mt-2 d-block d-sm-inline float-sm-right">Open</span></h4>
    @endif

    <h1>{{ $case->case_number }}</h1>
    <h4 class="text-muted">
        Filed:
        <span class="font-weight-light">{{ date_format( new DateTime($case->date_filed) , 'M j, Y') }}</span>
    </h4>

    <br><br>

    <h2>
        @if(count($parties) > 1)
            Plaintiffs
        @else
            Plaintiff
        @endif
    </h2>

    @foreach($parties as $party)
        <hr>
        <p>
            <strong>Name:</strong><br>
            {{ ucwords(strtolower($party->name)) }}
        </p>
        <p>
            <strong>Address:</strong><br>
            {{ ucwords(strtolower($party->address)) }}
            <br>
            {{ ucwords(strtolower($party->city)) }},
            {{ $party->state }} {{ $party->zip }}
            <br>
            <small>
                <a href="https://maps.google.com/?q={{ ucwords(strtolower($party->address)) }} {{ ucwords(strtolower($party->city)) }} {{ $party->state }} {{ $party->zip }}" target="_blank">
                    view on map
                </a>
            </small>

        </p>
    @endforeach


</div>


@stop
