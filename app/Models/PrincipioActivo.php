<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrincipioActivo extends Model
{
    use HasFactory;
    
    static function loadById($id) {
        return PrincipioActivo::query()->find($id);
    }
}
