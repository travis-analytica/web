<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CaseNote extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_note';

    /**
     * Get the record's author.
     *
     * @param  integer  $value
     * @return string
     */
    function getUserIdAttribute($value)
    {
        $user = User::find($value);
        return $user->name;
    }

    /**
     * Get the record's creation timestamp.
     *
     * @param  datetime  $value
     * @return string
     */
    function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('j M y, g:i a');
    }

}
