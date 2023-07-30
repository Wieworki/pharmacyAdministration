<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private function rol(): HasOne
    {
        return $this->hasOne(Role::class);
    }

    public function isAdmin() {
        return $this->rol()->isAdmin();
    }

    public function isOperador() {
        return $this->rol()->isOperador();
    }

    public function isMedico() {
        return $this->rol()->isMedico();
    }

    public function isFarmaceutico() {
        return $this->rol()->isFarmaceutico();
    }

    public function isContador() {
        return $this->rol()->isContador();
    }
}
