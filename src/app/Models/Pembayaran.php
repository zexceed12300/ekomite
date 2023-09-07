<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'tapel_id',
        'angsuran_id',
        'sumbangan',
        'user_id',
        'tanggal',
    ];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function angsuran() {
        return $this->belongsTo(Angsuran::class);
    }
    
    public function tapel() {
        return $this->belongsTo(Tapel::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
