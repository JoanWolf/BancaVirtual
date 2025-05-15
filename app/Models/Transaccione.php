<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaccione
 *
 * @property $id
 * @property $llave_fk
 * @property $Fecha_Envio
 * @property $Monto
 * @property $Referencia
 * @property $Tipo
 * @property $Estado
 * @property $Emisor_fk
 * @property $Receptor_fk
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Llafe $llafe
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Transaccione extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['llave_fk', 'Fecha_Envio', 'Monto', 'Referencia', 'Tipo', 'Estado', 'Emisor_fk', 'Receptor_fk'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_emisor()
    {
        return $this->belongsTo(\App\Models\User::class, 'Emisor_fk', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function llafe()
    {
        return $this->belongsTo(\App\Models\Llafe::class, 'llave_fk', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_receptor()
    {
        return $this->belongsTo(\App\Models\User::class, 'Receptor_fk', 'id');
    }

}
