<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxInfo extends Model
{

    /**
     * The table associated with the model.
     */
    protected $table="tax_info";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;
}
