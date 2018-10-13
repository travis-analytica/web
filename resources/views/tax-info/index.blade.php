@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8">
        <h1>Tax Information</h1>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('tax-info.export')           }}" class="btn btn-outline-secondary btn-lg float-sm-right d-block d-sm-inline mt-2 ml-4">EXPORT</a>
        <a href="{{ route('tax-info.parcel-id.upload') }}" class="btn btn-outline-success   btn-lg float-sm-right d-block d-sm-inline mt-2 ml-4">UPLOAD</a>
    </div>
</div>


<div class="table-responsive">
<table id="datatable" class="table table-bordered table-striped table-hover">
    <thead>
    <tr class="text-nowrap">
        <th>Parcel ID</th>
        <th>Address</th>
        <th>Zip Code</th>
        <th>Company Name</th>
        <th>Name 1</th>
        <th>Name 2</th>
        <th>Address</th>
        <th>City/State/Zip</th>
        <th>Tax District</th>
        <th>School District</th>
        <th>Rental Registration</th>
        <th>Tax Lien</th>
        <th>Year Built</th>
        <th>Fin Area</th>
        <th>Bedrooms</th>
        <th>Full Baths</th>
        <th>Half Baths</th>
        <th>Acres</th>
        <th>Tansfer Date</th>
        <th>Transfer Price</th>
        <th>Property Class</th>
        <th>Land Use</th>
        <th>Net Annual Tax</th>
        <th>Annual Total</th>
        <th>Payment Total</th>
        <th>Total Total</th>
    </tr>
    </thead>
    <tbody>
        @foreach($parcels as $parcel)
        <tr>
            <td>{{ $parcel->parcel_id }}</td>
            <td>{{ $parcel->address }}</td>
            <td>{{ $parcel->ts_zip_code }}</td>
            <td>{{ $parcel->company_name }}</td>
            <td>{{ $parcel->tbm_name_1 }}</td>
            <td>{{ $parcel->tbm_name_2 }}</td>
            <td>{{ $parcel->tbm_address }}</td>
            <td>{{ $parcel->tbm_city_state_zip }}</td>
            <td>{{ $parcel->ts_tax_district }}</td>
            <td>{{ $parcel->ts_school_district }}</td>
            <td>{{ $parcel->ts_rental_registration }}</td>
            <td>{{ $parcel->ts_tax_lien }}</td>
            <td>{{ $parcel->dd_year_built }}</td>
            <td>{{ $parcel->dd_fin_area }}</td>
            <td>{{ $parcel->dd_bedrooms }}</td>
            <td>{{ $parcel->dd_full_baths }}</td>
            <td>{{ $parcel->dd_half_baths }}</td>
            <td>{{ $parcel->sd_acres }}</td>
            <td>{{ $parcel->mrt_tansfer_date }}</td>
            <td>{{ $parcel->mrt_transfer_price }}</td>
            <td>{{ $parcel->property_class }}</td>
            <td>{{ $parcel->land_use }}</td>
            <td>{{ $parcel->net_annual_tax }}</td>
            <td>{{ $parcel->tyd_annual_total }}</td>
            <td>{{ $parcel->tyd_payment_total }}</td>
            <td>{{ $parcel->tyd_total_total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

{{$parcels->links()}}

@stop
