<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keluhan extends Model
{
    use HasFactory;

    protected $table = 'keluhans';

    protected $fillable = [
        'keluhan',
        'status',
        'masyarakat_id'
    ];

    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
    }
}