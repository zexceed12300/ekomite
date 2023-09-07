<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama',
        'sumbangan',
        'alamat',
        'tanggal_lahir',
        'wali_murid',
        'kelas',
        'jenis_kelamin',
        'keterampilan',
        'golongan_darah',
        'agama',
    ];

    // scope filter by name or nisn
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%' . request('search') . '%')
                         ->orWhere('nisn', 'like', '%' . request('search') . '%')
                         ->orWhere('kelas', 'like', '%' . request('search') . '%');
        });
    }

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class);
    }
}
