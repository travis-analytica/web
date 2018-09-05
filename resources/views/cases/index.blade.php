@extends('layouts.app')

@section('content')

<h1>Eviction Cases</h1>

<div class="table-responsive">
<table id="datatable" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Case Number</th>
            <th>Date Filed</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($cases as $case)
    <tr>
        <td>
            {{ $case->case_number}}
        </td>
        <td>
            {{ $case->date_filed }}
        </td>
        <td class="text-center">
            @if($case->status == 1)
                <span class="badge badge-danger p-2 d-block">Closed</span>
            @else
                <span class="badge badge-success p-2 d-block">Open</span>
            @endif
        </td>
        <td>
            <a class="btn btn-outline-primary btn-sm btn-block" href="{{ route('case.show', $case->id) }}">View</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $cases->links() }}

@stop
