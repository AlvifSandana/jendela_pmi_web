<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileUnit extends Model
{
    // table name
    protected $table = 'mobile_unit';
    // automatic fill timestamps
    public $timestamps = true;
    // mass assignment
    protected $fillable = [
        'tanggal_donor', 'lokasi_donor', 'waktu_mulai', 'waktu_selesai', 'deskripsi'
    ];
}
