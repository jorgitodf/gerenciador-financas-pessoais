<?php

namespace App\Models;

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
}
