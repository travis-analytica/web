@extends('layouts.app')

@section('content')

<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>Case Number</th>
        <th>Date Filed</th>
        <th>Status</th>
        <th></th>
    </tr>
    @foreach($cases as $case)
    <tr>
        <td>
            {{ $case->case_number}}
        </td>
        <td>
            {{ $case->date_filed }}
        </td>
        <td>
            @if($case->status == 1)
                <span class="badge badge-danger p-2">Closed</span>
            @else
                <span class="badge badge-success p-2">Open</span>
            @endif
        </td>
        <td>
            <a class="btn btn-outline-primary btn-sm btn-block" href="{{ route('case.show', $case->id) }}">View</button>
        </td>
    </tr>
    @endforeach
</table>

@stop