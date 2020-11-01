<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMainItem extends Model
{
    use HasFactory;

    public function carItem()
    {
        return $this->belongsTo(CarItem::class);
    }
}
