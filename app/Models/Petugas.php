<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Target;
use App\Models\Pengawas;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    // public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_lengkap',
        'pengawas_id',
        'no_ktp',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'no_tlp',
        'alamat',
        'nip',
    ];

    public function target(){
        return $this->hasMany(Target::class);
    }

    public function pengawas(){
        return $this->belongsTo(Pengawas::class);
    }
}
