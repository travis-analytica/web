<?php

namespace App;

use Eloquent;
use Carbon\Carbon;

class Cases extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'case';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
  public $timestamps = false;

  function getCompletionStatusUpdatedAtAttribute($value)
  {
        if($value !== null){
            $date = Carbon::parse($value);
            return $date->format('j M y, g:i a');
        }
        return $value;
  }

}
?>
