<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    
    protected $table = "absensi";
    protected $fillable = ["id_krs", "id_pertemuan", "jam_masuk", "jam_keluar", "durasi"];

    public function krs(){

        return $this->belongsTo(Krs::class);

    }

    public function pertemuan(){

        return $this->belongsTo(Pertemuan::class);

    }

}
