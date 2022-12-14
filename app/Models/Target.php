<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;
use Illuminate\Support\Carbon;

class Target extends Model
{
    // use HasFactory;
    protected $table = 'targets'; //mendefinisikan bahwa model ini terkait dengan tabel targets
    // public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'tanggal',
        'petugas_id',
        'target',
        'status',
        'tgl_validasi'

    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tanggal'])
                ->translatedFormat('l, d F Y');
    }
    public function petugas()
    {
        return $this->belongsTo('App\Models\User', 'petugas_id', 'id');
    }

    public function pengawas()
    {
        return $this->belongsTo('App\Models\User', 'pengawas_id', 'id');
    }
}
