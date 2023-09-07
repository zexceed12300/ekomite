<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Angsuran;

class Tapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_pelajaran',
    ];

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class);
    }
}
