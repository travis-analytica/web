<?php

namespace App\Http\Controllers;

use Redirect;
use App\TaxInfo;
use App\Exports\TaxInfoExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TaxInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['parcels'] = TaxInfo::where('status', 1)->where('property_class', 'R - Residential')->paginate(10);

        return view('tax-info.index', $data);
    }

    /**
     * Display a bulk upload form for the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('tax-info.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $batchNumber = $this->getNextBatchNumber();

        $parcelList = explode("\r\n", $request->get('parcel-list') );
        foreach($parcelList as $parcelId) {
            $this->insertParcelId($parcelId, $batchNumber);
        }

        return Redirect::route('tax-info.index');
    }

    /**
     * Get the next iteration of the resource's batch id.
     *
     * @return Integer
     */
    public function getNextBatchNumber()
    {
        $lastBatchId = TaxInfo::select('batch_id')->orderBy('batch_id', 'DESC')->first();
        return ( intval($lastBatchId->batch_id) ) + 1;
    }

    /**
     * Handle update/insert of a parcel id.
     *
     * @param String $parcelId
     * @param Integer $batchId
     */
    public function insertParcelId($parcelId, $batchId)
    {
        $updateCount = TaxInfo::where('parcel_id', $parcelId)->limit(1)->update(['batch_id' => $batchId]);
        if($updateCount == 0) {
            $parcel = new TaxInfo();
            $parcel->batch_id = $batchId;
            $parcel->status = 0;
            $parcel->parcel_id = $parcelId;
            $parcel->save();
        }
    }

    /**
     * Export the specified resource to an Excel file.
     *
     * @return Maatwebsite\Excel\Facades\Excel
     */
    public function export()
    {
        ini_set('memory_limit', '-1');
        return Excel::download(new TaxInfoExport, 'tax_info.xlsx');
    }
}
