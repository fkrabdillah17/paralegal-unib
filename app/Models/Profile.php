<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
    public function sub_division()
    {
        return $this->belongsTo(Sub_division::class, 'sub_division_id', 'id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
