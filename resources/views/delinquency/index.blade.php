@extends('layouts.app')

@section('content')

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>property_class</th>
        <th>parcel_id</th>
        <th>flag_summary</th>
        <th>owner_name_1</th>
        <th>owner_Name_2</th>
        <th>supp_rllbk_flag</th>
        <th>hmstd_flag</th>
        <th>mail_name_1</th>
        <th>mail_name_2</th>
        <th>mail_address_1</th>
        <th>mail_address_2</th>
        <th>mailing_address_city</th>
        <th>mailing_address_state</th>
        <th>mailing_address_zip</th>
        <th>mailing_address_plus4</th>
        <th>mailing_address_1</th>
        <th>owner_address_1</th>
        <th>owner_address_2</th>
        <th>local_address_2</th>
        <th>legal_desc</th>
        <th>total_val</th>
        <th>net_tax_due</th>
    </tr>
    @foreach($delinquencies as $delinquency)
    <tr>
        <td>{{ $delinquency->property_class }}</td>
        <td>{{ $delinquency->parcel_id }}</td>
        <td>{{ $delinquency->flag_summary }}</td>
        <td>{{ $delinquency->owner_name_1 }}</td>
        <td>{{ $delinquency->owner_Name_2 }}</td>
        <td>{{ $delinquency->supp_rllbk_flag }}</td>
        <td>{{ $delinquency->hmstd_flag }}</td>
        <td>{{ $delinquency->mail_name_1 }}</td>
        <td>{{ $delinquency->mail_name_2 }}</td>
        <td>{{ $delinquency->mail_address_1 }}</td>
        <td>{{ $delinquency->mail_address_2 }}</td>
        <td>{{ $delinquency->mailing_address_city }}</td>
        <td>{{ $delinquency->mailing_address_state }}</td>
        <td>{{ $delinquency->mailing_address_zip }}</td>
        <td>{{ $delinquency->mailing_address_plus4 }}</td>
        <td>{{ $delinquency->mailing_address_1 }}</td>
        <td>{{ $delinquency->owner_address_1 }}</td>
        <td>{{ $delinquency->owner_address_2 }}</td>
        <td>{{ $delinquency->local_address_2 }}</td>
        <td>{{ $delinquency->legal_desc }}</td>
        <td>{{ $delinquency->total_val }}</td>
        <td>{{ $delinquency->net_tax_due }}</td>
    </tr>
    @endforeach
</table>
</div>

{{$delinquencies->links()}}

@stop
