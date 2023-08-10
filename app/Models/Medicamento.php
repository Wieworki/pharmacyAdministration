<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Medicamento extends Model
{
    use HasFactory;

    protected function laboratorio(): HasOne
    {
        return $this->hasOne(Laboratorio::class);
    }

    protected function principioActivo(): HasOne
    {
        return $this->hasOne(PrincipioActivo::class);
    }

    public function getLaboratorio() {
        return $this->laboratorio()->getNombre();
    }

    public function getPrincipioActivo() {
        return $this->principioActivo()->getNombre();
    }

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
