<?php

namespace App;

use Eloquent;

class Delinquency extends Eloquent
{

      /**
       * The database table used by the model.
       *
       * @var string
       */
      protected $table = 'delinquency';

      /**
       * Get the record's property class.
       *
       * @param  integer  $value
       * @return string
       */
      function getPropertyClassAttribute($value)
      {
        $classes = [
          'R - Residential',
          'C - Commercial',
          'E - Exempt',
          'I - Industrial',
          'A - Agricultural',
          'Z - Utility',
        ];

        return $classes[$value - 1];
      }

}
