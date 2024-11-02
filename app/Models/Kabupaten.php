<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'cities';
    protected $primaryKey = 'city_id';
    public function provinsi()
    {
        return $this->belongsTo(Province::class);
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }
}
