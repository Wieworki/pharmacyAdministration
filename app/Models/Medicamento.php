<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medicamento extends Model
{
    use HasFactory;

    static function loadById($id) {
        return Medicamento::query()->find($id);
    }

    protected function laboratorio(): BelongsTo
    {
        return $this->belongsTo(Laboratorio::class);
    }

    protected function principioActivo(): BelongsTo
    {
        return $this->belongsTo(PrincipioActivo::class);
    }

    public function getLaboratorio() {
        return $this->laboratorio->nombre;
    }

    public function getPrincipioActivo() {
        return $this->principioActivo->nombre;
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
