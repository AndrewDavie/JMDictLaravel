<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //ASD 270919 set primary key to ent_seq rather than id
    protected $primaryKey = 'ent_seq';
}
