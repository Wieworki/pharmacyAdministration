<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Sexo;

class Afiliado extends Model
{
    use HasFactory;
    
    protected function sexo(): HasOne
    {
        return $this->hasOne(Sexo::class);
    }

    public function isHombre() {
        return $this->sexo->isHombre();
    }

    public function isMujer() {
        return $this->sexo->isMujer();
    }

    public function isOtro() {
        return $this->sexo->isOtro();
    }
}
