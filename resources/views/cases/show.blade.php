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
                @if(count($plaintiffs) > 1)
                    Plaintiffs
                @else
                    Plaintiff
                @endif
                <small class="text-muted">({{count($plaintiffs)}})</small>
            </h2>

            @foreach($plaintiffs as $plaintiff)
                <hr>
                <div class="row">
                    <p class="col-12">
                        <strong>Name:</strong><br>
                        {{ ucwords(strtolower($plaintiff->name)) }}
                    </p>
                    <p class="col-12">
                        <strong>Address:</strong><br>
                        {{ ucwords(strtolower($plaintiff->address)) }}
                        <br>
                        {{ ucwords(strtolower($plaintiff->city)) }},
                        {{ $plaintiff->state }} {{ $plaintiff->zip }}
                        <br>
                        <small>
                            <a href="https://maps.google.com/?q={{ ucwords(strtolower($plaintiff->address)) }} {{ ucwords(strtolower($plaintiff->city)) }} {{ $plaintiff->state }} {{ $plaintiff->zip }}" target="_blank">
                                view on map
                            </a>
                        </small>

                    </p>
                </div>
            @endforeach

            <hr>


            <h2>
                @if(count($defendants) > 1)
                    Defendants
                @else
                    Defendant
                @endif
                <small class="text-muted">({{count($defendants)}})</small>
            </h2>

            @foreach($defendants as $defendant)
                <hr>
                <div class="row">
                    <p class="col-12">
                        <strong>Name:</strong><br>
                        {{ ucwords(strtolower($defendant->name)) }}
                    </p>
                    <p class="col-12">
                        <strong>Address:</strong><br>
                        {{ ucwords(strtolower($defendant->address)) }}
                        <br>
                        {{ ucwords(strtolower($defendant->city)) }},
                        {{ $defendant->state }} {{ $defendant->zip }}
                        <br>
                        <small>
                            <a href="https://maps.google.com/?q={{ ucwords(strtolower($defendant->address)) }} {{ ucwords(strtolower($defendant->city)) }} {{ $defendant->state }} {{ $defendant->zip }}" target="_blank">
                                view on map
                            </a>
                        </small>

                    </p>
                </div>
            @endforeach
        </div>

        <div class="col-sm-6">
            <h2 class="d-inline">Status</h2>
            @if($case->completion_status_updated_at != null)
                <small class="text-muted">Updated: {{ $case->completion_status_updated_at }}</small>
            @endif

            <form action="{{ route('case.status.store', $case->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="btn-group d-flex" role="group">
                    <button type="submit" name="completion_status" value="0" class="btn btn-sm btn-outline-secondary w-100 {{ ($case->completion_status == 0)?'active':null }}">Not Started</button>
                    <button type="submit" name="completion_status" value="1" class="btn btn-sm btn-outline-secondary w-100 {{ ($case->completion_status == 1)?'active':null }}">In Progress</button>
                    <button type="submit" name="completion_status" value="2" class="btn btn-sm btn-outline-secondary w-100 {{ ($case->completion_status == 2)?'active':null }}">Complete</button>
                </div>
            </form>

            <br>

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
