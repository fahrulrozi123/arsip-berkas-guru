<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nuptk', 'ijazah_S1', 'ijazah_S2', 'ktp', 'ijazah_SMA', 'ijazah_SMP', 'kk', 'ijazah_SD', 'sk_kepsek', 'sk_yayasan', 'akte'
    ];
}
