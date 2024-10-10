<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Explorer;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'valor',
        'latitude',
        'longitude',
        'explorer_id',
    ];

    public function explorer() {
        return $this->belongsTo(Explorer::class);
        }
}
