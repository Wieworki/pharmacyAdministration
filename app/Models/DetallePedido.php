<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetallePedido extends Model
{
    use HasFactory;

    public function pedidoFarmacia(): HasOne
    {
        return $this->hasOne(PedidoFarmacia::class);
    }

    public function item(): HasOne
    {
        return $this->hasOne(Item::class);
    }
}
