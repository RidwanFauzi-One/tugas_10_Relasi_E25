<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Masyarakat extends Model
{
    use HasFactory;

    protected $table = 'masyarakats';

    protected $fillable = [
        'nomor_kk',
        'nomor_ktp',
        'nama',
        'alamat',
        'jenis_kelamin'
    ];

    public function keluhans(): HasMany
    {
        return $this->hasMany(Keluhan::class, 'masyarakat_id');
    }
}