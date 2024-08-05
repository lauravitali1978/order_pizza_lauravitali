<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordine extends Model
{
    public function tavolo()
    {
        return $this->belongsTo(Tavolo::class);
    }

    public function piatti()
    {
        return $this->belongsToMany(Piatto::class, 'dish_order')->withPivot('quantita');
    }
}
