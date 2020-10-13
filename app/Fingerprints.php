<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fingerprints extends Model
{
    protected $table = "fingerprints";
    protected $fillable = ['abstrak', 'fingerprint'];
}
