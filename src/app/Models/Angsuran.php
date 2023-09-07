<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tapel;

class Angsuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'ket',
    ];

    public function pembayaran() 
    {
        return $this->hasMany(Pembayaran::class);
    }
}