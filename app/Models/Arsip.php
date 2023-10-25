<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Arsip extends Model
{
    use HasFactory;
    protected $table = "informations";
    protected $primaryKey = "id";
    protected $fillable = [
        'kode_arsip',
        'informasi',
        'nomor',
        'jumlah_berkas',
        'no_item',
        'isi',
        'kurun_waktu',
        'jumlah',
        'keterangan',
        'lokasi',
    ];
}
