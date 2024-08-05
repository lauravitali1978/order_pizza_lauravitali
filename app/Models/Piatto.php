<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piatto extends Model
{
    public function ordini()
    {
        return $this->belongsToMany(Ordine::class, 'dish_order')->withPivot('quantita');
    }
}
