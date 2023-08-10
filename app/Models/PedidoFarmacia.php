<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PedidoFarmacia extends Model
{
    use HasFactory;

    public function afiliado(): HasOne
    {
        return $this->hasOne(Afiliado::class);
    }

    protected function estadoPedido(): HasOne
    {
        return $this->hasOne(EstadoPedido::class);
    }

    public function isAprobado() {
        return $this->estadoPedido()->isAprobado();
    }

    public function isPendiente() {
        return $this->estadoPedido()->isPendiente();
    }

    public function isRechazado() {
        return $this->estadoPedido()->isRechazado();
    }

    public function isEntregado() {
        return $this->estadoPedido()->isEntregado();
    }

    public function isAnulado() {
        return $this->estadoPedido()->isAnulado();
    }
}
