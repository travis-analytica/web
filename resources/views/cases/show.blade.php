@extends('layouts.app')

@section('content')

<div class="col-sm-8 offset-sm-2">

    @if($case->status == 1)
        <h4><span class="bg-danger rounded text-white text-center p-2 mt-2 d-block d-sm-inline float-sm-right">Closed</span></h4>
    @else
        <h4><span class="bg-success rounded text-white text-center p-2 mt-2 d-block d-sm-inline float-sm-right">Open</span></h4>
    @endif

    <h1>{{ $case->case_number }}</h1>
    <h4 class="text-muted">
        Filed:
        <span class="font-weight-light">{{ date_format( new DateTime($case->date_filed) , 'M j, Y') }}</span>
    </h4>

    <hr><br>

    <div class="row">

        <div class="col-sm-6">
            <h2>
                @if(count($parties) > 1)
                    Plaintiffs
                @else
                    Plaintiff
                @endif
                <small class="text-muted">({{count($parties)}})</small>
            </h2>

            @foreach($parties as $party)
                <hr>
                <div class="row">
                    <p class="col-12">
                        <strong>Name:</strong><br>
                        {{ ucwords(strtolower($party->name)) }}
                    </p>
                    <p class="col-12">
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
                </div>
            @endforeach
        </div>

        <div class="col-sm-6">
            <h2>
                Notes
                <small class="text-muted">({{count($notes)}})</small>
            </h2>
            @foreach($notes as $note)
                <p class="mb-0">
                    <small>{{ $note->user_id }}</small>
                    <small class="text-muted">{{ $note->created_at }}</small>
                </p>
                <p>{{ $note->note }}</p>
                <hr>
            @endforeach

            <form action="{{ route('case.note.store', $case->id) }}" method="POST">
                {{ csrf_field() }}
                <textarea class="form-control" name="note" id="note" cols="500" rows="6" maxLength="21845"></textarea>
                <button class="btn btn-outline-success btn-sm float-right mt-3" type="submit">Add Note</button>
            </form>

        </div>

    </div>




</div>


@stop
