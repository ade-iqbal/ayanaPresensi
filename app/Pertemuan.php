<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    
    protected $table = "pertemuan";
    protected $fillable = ["id_kelas", "pertemuan_ke", "tanggal", "materi"];

    public function absensi(){

        return $this->hasMany(Absensi::class);

    }

}
