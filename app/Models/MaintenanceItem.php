<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceItem extends Model
{
    protected $fillable = ['car_items_id'];

    use HasFactory;

    public function maintenanceItem()
    {
        return $this->belongsTo(CarItem::class);
    }
}
