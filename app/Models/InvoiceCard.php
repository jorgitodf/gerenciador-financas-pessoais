<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\HelperFormatters\Helpers;

class InvoiceCard extends Model
{
    protected $fillable = [
        'data_pagamento_fatura', 'encargos', 'protecao_premiada', 'iof', 'pago', 'juros', 'valor_total_fatura', 'valor_pagamento_fatura',
        'ano_mes_ref', 'restante_fatura_mes_anterior', 'data_fechamento_fatura', 'credit_card_id'
    ];


    public function setDataPagamentoFaturaAttribute($value)
    {
        $this->attributes['data_pagamento_fatura'] = Helpers::formataData($value);
    }
    
}
