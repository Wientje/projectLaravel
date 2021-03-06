<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarItem extends Model
{
    protected $fillable = ['user_id'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function maintenanceItems()
    {
        return $this->hasMany(MaintenanceItem::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
