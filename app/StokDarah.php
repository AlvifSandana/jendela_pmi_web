<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokDarah extends Model
{
    // otomatis mengisi kolom timestamp
    public $timestamps = true;
    // nama tabel
    protected $table = 'stok_darah';
    // kolom primary key
    protected $primaryKey = 'id';
    // kolom yang diizinkan mass-assignment
    protected $fillable = [
        'produk', 'jenis_darah', 'jumlah'
    ];
}
