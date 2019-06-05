<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlagCards extends Model
{
    protected $fillable = [
        'bandeira'
    ];

    public function cartoes()
    {
        return $this->hasMany(CreditCard::class, 'flag_card_id', 'id');
    }

    // Mutator para Modificar o dado antes de salvá-lo no Banco de Dados
    public function setBandeiraAttribute($value)
    {
        $this->attributes['bandeira'] = trim(ucwords(strtoupper($value)));
    }

    public function getBandeiraFormattedAttribute()
    {
        return strtoupper($this->bandeira);
    }
}
