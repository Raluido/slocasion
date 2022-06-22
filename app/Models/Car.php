<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['user_id'];

    public function items() {
        return $this->hasMany(Item::class, 'car_id', 'id');
    }
}
