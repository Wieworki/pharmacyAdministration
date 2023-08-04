<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function isMedicameto() {
        return $this->es_medicamento == 1;
    }

    public function hasRecupero() {
        return $this->recupero == 1;
    }

    public function hasCoberturaDiabetes() {
        return $this->cobertura_diabetes == 1;
    }

    public function hasCoberturaDiscapacidad() {
        return $this->cobertura_diabetes == 1;
    }

    public function hasCoberturaAnticonceptiva() {
        return $this->cobertura_anticonceptiva == 1;
    }

    public function hasCobertura70() {
        return $this->cobertura_70 == 1;
    }

    public function hasCoberturaOncologica() {
        return $this->cobertura_oncologica == 1;
    }
}
