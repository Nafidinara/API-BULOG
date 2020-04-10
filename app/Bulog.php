<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

/**
 * Class Bulog
 * @package App
 * @mixin Eloquent
 */

class Bulog extends Model
{
    protected $table = 'bulogs';
    protected $primaryKey = 'bulog_id';
    protected $fillable = [
        'ktp','npwp','alamat','provinsi','kota','kecamatan','kelurahan',
        'username','pemilik','toko','entitas','dc','kategori','telfon',
        'keterangan','status'
    ];
}
