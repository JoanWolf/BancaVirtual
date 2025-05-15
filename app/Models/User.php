<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * Class User
 *
 * @property $id
 * @property $N_Documento
 * @property $Nombre
 * @property $Apellido
 * @property $Fecha_Nacimiento
 * @property $Tipo_Documento
 * @property $Telefono
 * @property $Rol
 * @property $Estado
 * @property $Saldo
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *

 *
 *
 *

 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['N_Documento', 'Nombre', 'Apellido', 'Fecha_Nacimiento', 'Tipo_Documento', 'Telefono', 'Rol', 'Estado', 'Saldo', 'email','password'];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
