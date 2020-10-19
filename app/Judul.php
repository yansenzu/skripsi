<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judul extends Model
{
    protected $table = 'judul';
    protected $fillable = ['id_categories','judul','fingerprint_judul'];
    protected $primaryKey = 'id_judul';
}
