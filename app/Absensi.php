<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    public $timestamps=FALSE;
    protected $table = "absensi";
    protected $fillable = ["krs_id", "pertemuan_id", "jam_masuk", "jam_keluar", "durasi"];

    public function krs(){

        return $this->belongsTo(Krs::class);

    }

    public function pertemuan(){

        return $this->belongsTo(Pertemuan::class);

    }

}
