<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nama',
        'alamat_ktp',
        'alamat_domisili',
        'prov_id',
        'city_id',
        'dis_id',
        'no_telp',
        'no_hp',
        'email',
        'kewarganegaraan',
        'negara_asal',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'status_nikah',
        'agama',

    ];

    public function provinsi()
    {
        return $this->belongsTo(Province::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
