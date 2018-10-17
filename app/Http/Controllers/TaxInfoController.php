<?php

namespace App\Http\Controllers;

use Storage;
use Redirect;
use App\TaxInfo;
use App\Exports\TaxInfoExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use \App\Http\Controllers\TaxInfoController;

class TaxInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestBatch = $this->getLatestBatchNumber();
        $parcelsInBatch = TaxInfo::where('batch_id', $latestBatch)->count();
        $scrapedParcels = TaxInfo::where('batch_id', $latestBatch)->where('status', '!=', 0)->count();

        $data['percentScraped'] = round( (100 / $parcelsInBatch) * $scrapedParcels , 2);

        $data['parcels'] = TaxInfo::where('status', 1)
            ->where('batch_id', $this->getLatestBatchNumber())
            ->where('property_class', 'R - Residential')
            ->paginate(10);

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
        set_time_limit(200);

        $batchNumber = $this->getNextBatchNumber();

        $parcelList = explode("\r\n", $request->get('parcel-list') );
        foreach($parcelList as $parcelId) {
            $this->insertParcelId($parcelId, $batchNumber);
        }

        return Redirect::route('tax-info.index');
    }

    /**
    * Get the last iteration of the resource's batch id.
    *
    * @return Integer
    */
    public static function getLatestBatchNumber()
    {
        $lastBatchId = TaxInfo::select('batch_id')->orderBy('batch_id', 'DESC')->first();
        return intval($lastBatchId->batch_id);
    }

    /**
     * Get the next iteration of the resource's batch id.
     *
     * @return Integer
     */
    private function getNextBatchNumber()
    {
        $lastBatchId = $this->getLatestBatchNumber();
        return $lastBatchId + 1;
    }

    /**
     * Check if a Parcel ID format is valid
     *
     * @param String
     * @return Boolean
     */
    private function isValidParcelId($parcelId)
    {
        return preg_match('/[0-9]{3}\-[0-9]{6}\-[0-9]{2}/', $parcelId);
    }

    /**
     * Handle update/insert of a parcel id.
     *
     * @param String $parcelId
     * @param Integer $batchId
     */
    public function insertParcelId($parcelId, $batchId)
    {
        if( $this->isValidParcelId($parcelId) ) {
            $updateCount = TaxInfo::where('parcel_id', $parcelId)->limit(1)->update(['batch_id' => $batchId]);
            if($updateCount == 0) {
                $parcel = new TaxInfo();
                $parcel->batch_id = $batchId;
                $parcel->status = 0;
                $parcel->parcel_id = $parcelId;
                $parcel->save();
            }
        }
    }

    /**
     * Export the specified resource to an Excel file.
     *
     * @return Maatwebsite\Excel\Facades\Excel
     */
    public static function export()
    {
        $batchId = TaxInfoController::getLatestBatchNumber();
        $filename = md5($batchId) . '.csv';

        $export = \App\TaxInfoExport::where('batch_id', $batchId)->first();

        if($export == null) {
            $export = new \App\TaxInfoExport();
        }
        $export->batch_id = $batchId;
        $export->storage_filename = $filename;
        $export->display_filename = 'batch_' . $batchId . '.csv';
        $export->save();

        $headings = [
            'Parcel ID',
            'Address',
            'Zip Code',
            'Company Name',
            'Name 1',
            'Name 2',
            'Address',
            'City/State/Zip',
            'Tax District',
            'School District',
            'Rental Registration',
            'Tax Lien',
            'Year Built',
            'Fin Area',
            'Bedrooms',
            'Full Baths',
            'Half Baths',
            'Acres',
            'Tansfer Date',
            'Transfer Price',
            'Property Class',
            'Land Use',
            'Net Annual Tax',
            'Annual Total',
            'Payment Total',
            'Total Total',
        ];

        $file = fopen(storage_path($filename), 'w');
        fputcsv($file, $headings);

        $running = true;
        $countSize = 1000;
        $skipSize = 0;

        while($running) {

            $taxData = TaxInfo::select(
                'parcel_id',              'address',                'ts_zip_code',
                'company_name',           'tbm_name_1',             'tbm_name_2',
                'tbm_address',            'tbm_city_state_zip',     'ts_tax_district',
                'ts_school_district',     'ts_rental_registration', 'ts_tax_lien',
                'dd_year_built',          'dd_fin_area',            'dd_bedrooms',
                'dd_full_baths',          'dd_half_baths',          'sd_acres',
                'mrt_tansfer_date',       'mrt_transfer_price',     'property_class',
                'land_use',               'net_annual_tax',         'tyd_annual_total',
                'tyd_payment_total',      'tyd_total_total'
            )
            ->where('batch_id', $batchId)
            ->where('status', 1)
            ->skip($skipSize)
            ->limit($countSize)
            ->get()
            ->toArray();

            if( count($taxData) < $countSize) {
                $running = false;
                $export->status = 1;
                $export->save();
            }else{
                $skipSize += $countSize;
            }

            foreach($taxData as $row) {
                fputcsv($file, $row);
            }

        }
    }
}
