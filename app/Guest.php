<?php

namespace App;

use Codesmith\Eloquent\Uuid\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasUuid;
    protected $connection = 'mysql';
    protected $fillable =['instansi','jam_hadir','verifikasi'];
    protected $table = 'guests';
}
