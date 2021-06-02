<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{

	protected $table = "kelas";
	protected $fillable = ["id_kelas","kode_kelas", "kode_matkul", "nama_matkul", "tahun", "semester", "sks"];

	public $timestamps = false;

	public function krs(){

		return $this->hasMany(Krs::class);

	}

}
