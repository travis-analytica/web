<?php

namespace App;

use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TaxInfoExport extends Model
{

    /**
     * The table associated with the model.
     */
    protected $table="tax_info_export";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Format the timestamp for the export file
     *
     */
    public function getExportDateAttribute($value)
    {
        return Carbon::parse($value)->format('d M Y - h:i A');
    }
}
