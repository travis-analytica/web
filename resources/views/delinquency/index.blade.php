@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8">
        <h1>Tax Delinquencies</h1>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('delinquency.export') }}" class="btn btn-outline-secondary btn-lg float-sm-right d-block d-sm-inline mt-2">EXPORT</a>
    </div>
</div>


<div class="table-responsive">
<table id="datatable" class="table table-bordered table-striped table-hover">
    <thead>
    <tr class="text-nowrap">
    <th>1: Parcel ID</th>
    <th>2: Mail Address 1</th>
    <th>3: Mailing Address Zip</th>
    <th>4: COMPANY NAME</th>
    <th>5: Owner Name 1</th>
    <th>6: Owner Name 2</th>
    <th>7: Owner Address 1</th>
    <th>8: Owner City/State/Zip</th>
    <th>9: TAX DISTRICT</th>
    <th>10: SCHOOL DISTRICT</th>
    <th>11: RENTAL REGISTRATION</th>
    <th>12: TAX LIEN</th>
    <th>13: YEAR BUILT</th>
    <th>14: TOTAL SQ. FEET</th>
    <th>15: BEDROOMS</td>
    <th>16: FULL BATHROOMS</td>
    <th>17: HALF BATHROOMS</td>
    <th>18: ACRES</td>
    <th>19: TRANSFER DATE</td>
    <th>20: TRANSFER PRICE</td>
    <th >21: PROPERTY CLASS</td>
    <th>22: LAND USE</td>
    <th>23: ANNUAL TAXES</td>
    <th>24: PRIOR TAX OWED</td>
    <th>25: PAYMENT</td>
    <th>26: BALANCE TAXES DUE</td>
    </tr>
    </thead>
    <tbody>
    @foreach($delinquencies as $delinquency)
        <tr>
        <td>{{ $delinquency->parcel_id }}</td>
        <td>{{ $delinquency->mail_address_1 }}</td>
        <td>{{ $delinquency->mailing_address_zip }}</td>
        <td class="table-info"></td>
        <td>{{ $delinquency->owner_name_1 }}</td>
        <td>{{ $delinquency->owner_Name_2 }}</td>
        <td>{{ $delinquency->owner_address_1 }}</td>
        <td>
            {{ $delinquency->mailing_address_city }}
            {{ $delinquency->mailing_address_state }}
            {{ $delinquency->mailing_address_zip }}
        </td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td>{{ $delinquency->property_class }}</td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td class="table-danger"></td>
        <td>{{ $delinquency->net_tax_due }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

{{$delinquencies->links()}}

@stop
