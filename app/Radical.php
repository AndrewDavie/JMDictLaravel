<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radical extends Model
{
    //ASD 161019 Set PK to character.  It will be an integer from 1 to 214
    protected $primaryKey = 'character';
    //ASD 161019 No timestamps.
    public $timestamps = false;
}
