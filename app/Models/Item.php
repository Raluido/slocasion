<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = ['filename', 'main'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
