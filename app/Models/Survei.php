<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengawas;

class Survei extends Model
{
    use HasFactory;
    protected $table = "survei";
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_survei',
        'total_target',
        'total_petugas',
        'total_pengawas',
        'jh_penyelesaian',
        'target_petugas',
    ];

    public function pengawas(){
        return $this->hasMany(Pengawas::class);
    }
}
