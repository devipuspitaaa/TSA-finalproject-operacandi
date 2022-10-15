<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Survei;

class Pengawas extends Model
{
    use HasFactory;
    protected $table = "pengawas";
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_lengkap',
        'survei_id',
        'no_ktp',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'no_tlp',
        'alamat',
        'nip',
    ];

    public function petugas(){
        return $this->hasMany(Petugas::class);
    }

    public function survei(){
        return $this->belongsTo(Survei::class);
    }
}
