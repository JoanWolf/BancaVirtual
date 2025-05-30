<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pqr
 *
 * @property $id
 * @property $Asunto
 * @property $Fecha_Envio
 * @property $Estado
 * @property $Descripcion
 * @property $Respuesta
 * @property $Emisor_fk
 * @property $Receptor_fk
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pqr extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['Asunto', 'Fecha_Envio', 'Estado', 'Descripcion', 'Respuesta', 'Estado_R', 'Emisor_fk', 'Receptor_fk'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_Emisor()
    {
        return $this->belongsTo(\App\Models\User::class, 'Emisor_fk', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_Receptor()
    {
        return $this->belongsTo(\App\Models\User::class, 'Receptor_fk', 'id');
    }

}
