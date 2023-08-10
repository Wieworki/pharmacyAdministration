<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    use HasFactory;

    public function isPendiente() {
        return $this->nombre == "PENDIENTE";
    }

    public function isAprobado() {
        return $this->nombre == "APROBADO";
    }

    public function isRechazado() {
        return $this->nombre == "RECHAZADO";
    }

    public function isEntregado() {
        return $this->nombre == "ENTREGADO";
    }

    public function isAnulado() {
        return $this->nombre == "ANULADO";
    }
}
