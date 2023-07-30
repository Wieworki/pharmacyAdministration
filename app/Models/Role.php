<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function isAdmin() {
        return $this->nombre == "admin";
    }

    public function isOperador() {
        return $this->nombre == "operador";
    }

    public function isMedico() {
        return $this->nombre == "medico";
    }

    public function isFarmaceutico() {
        return $this->nombre == "farmaceutico";
    }

    public function isContador() {
        return $this->nombre == "contador";
    }
}
