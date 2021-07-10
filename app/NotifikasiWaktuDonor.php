<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifikasiWaktuDonor extends Model
{
    // otomatis mengisi kolom timestamp
    public $timestamps = true;
    // nama tabel
    protected $table = 'notifikasi_waktu_donor';
    // kolom primary key
    protected $primaryKey = 'id';
    // kolom yang diizinkan mass-assignment
    protected $fillable = [
        'jenis_darah', 'waktu_donor', 'pendonor_id'
    ];
}
