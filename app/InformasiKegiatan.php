<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformasiKegiatan extends Model
{
    // otomatis mengisi kolom timestamps
    public $timestamps = true;
    // nama tabel
    protected $table = 'informasi_kegiatan';
    // kolom primary key
    protected $primaryKey = 'id_kegiatan';
    // kolom yang diizinkan mass-assignment
    protected $fillable = [
        'nama_kegiatan', 'tanggal_kegiatan', 'lokasi_kegiatan',
        'user_id', 'foto'
    ];
}
