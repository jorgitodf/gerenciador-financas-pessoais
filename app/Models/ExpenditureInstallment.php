<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\HelperFormatters\Helpers;

class ExpenditureInstallment extends Model
{
    protected $fillable = [
        'valor', 'numero_parcela', 'data_pagamento', 'expense_card_id'
    ];

    public function despesa()
    {
        return $this->belongsTo(ExpenditureInstallment::class, 'expense_card_id', 'id');
    }

    public function setNumeroParcelaAttribute($value)
    {
        if ($value == 1) {
            $this->attributes['numero_parcela'] = "01/0".$value;
        } 
    }

    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = Helpers::formatarMoeda($value);
    }

    public function setDataPagamentoAttribute($value)
    {
        $this->attributes['data_pagamento'] = Helpers::formataData($value);
    }

}
