<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'codigo_agencia', 'digito_verificador_agencia', 'numero_conta', 'digito_verificador_conta', 'codigo_operacao', 
        'user_id', 'bank_id', 'account_type_id'
    ];

    public function tipo_conta()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id', 'id');
    }

    public function banco()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'cod_banco');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Mutator para Modificar o dado antes de salvá-lo no Banco de Dados
    public function getCodigoAgenciaFormattedAttribute()
    {
        return str_pad($this->codigo_agencia, 4, '0', STR_PAD_LEFT);
    }
    public function getCodigoOperacaoFormattedAttribute()
    {
        return str_pad($this->codigo_operacao, 3, '0', STR_PAD_LEFT);
    }

}
