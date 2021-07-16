<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendonor extends Model
{
    // otomatis mengisi kolom timestamp
    public $timestamps = true;
    // nama table
    protected $table = 'pendonor';
    // kolom primary key
    protected $primaryKey = 'id';
    // kolom yang diizinkan mass-assignment
    protected $fillable = [
        'nama_pendonor', 'email', 'password',
        'alamat', 'telepon', 'ttl', 'golongan_darah', 'status',
        'photo', 'api_token', 'remember_token',
        'roles_id', 'user_id'
    ];
}
