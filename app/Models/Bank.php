<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'cod_banco', 'nome_banco'
    ];
    protected $primaryKey = 'cod_banco';

    public function cartoes()
    {
        return $this->hasMany(CreditCard::class, 'bank_id', 'cod_banco');
    }
    
    // Mutator para Modificar o dado antes de salvá-lo no Banco de Dados
    public function setNomeBancoAttribute($value)
    {
        $this->attributes['nome_banco'] = trim(ucwords(strtoupper($value)));
    }

    public function getCodBancoFormattedAttribute()
    {
        return str_pad($this->cod_banco, 3, '0', STR_PAD_LEFT);
    }
}
