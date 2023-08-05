<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    public function isHombre() {
        return $this->denominacion == "hombre";
    }

    public function isMujer() {
        return $this->denominacion == "mujer";
    }

    public function isOtro() {
        return $this->denominacion == "otro";
    }
}
