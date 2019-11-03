<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //ASD 151019 set primary key to 'literal' rather than id
    protected $primaryKey = 'literal';
    public $timestamps = false;
}
