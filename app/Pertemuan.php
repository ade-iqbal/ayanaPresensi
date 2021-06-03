<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    public $timestamps=false;
    protected $table = "pertemuan";
    protected $fillable = ["kelas_id", "pertemuan_ke", "tanggal", "materi"];

    public function absensi(){

        return $this->hasMany(Absensi::class);

    }

}
