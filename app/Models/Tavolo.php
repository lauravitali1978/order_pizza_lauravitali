<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tavolo extends Model
{
    protected $fillable = ['numero', 'posti'];

    public function ordini()
    {
        return $this->hasMany(Ordine::class);
    }
}
