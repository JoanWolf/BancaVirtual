<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Llafe
 *
 * @property $id
 * @property $Id_Propietario_fk
 * @property $Tipo
 * @property $Valor
 *
 * @property User $user

 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Llafe extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['Id_Propietario_fk', 'Tipo', 'Valor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'Id_Propietario_fk', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


}
