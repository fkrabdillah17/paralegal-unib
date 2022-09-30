<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pelapor()
    {
        return $this->belongsTo(User::class, 'id_pelapor', 'id');
    }
    public function penjawab()
    {
        return $this->belongsTo(User::class, 'id_penjawab', 'id');
    }
}
