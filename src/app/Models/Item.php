<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\explorer;

class item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'valor',
        'latitude',
        'longitude',
        'explorers_id',
    ];

    public function pessoa() {
        return $this->belongsTo(explorer::class);
        }
}
