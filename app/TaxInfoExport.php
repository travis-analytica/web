<?php

namespace App;

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
}
