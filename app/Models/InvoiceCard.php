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

    public function cartao()
    {
        return $this->belongsTo(CreditCard::class, 'credit_card_id', 'id');
    }


    public function setDataPagamentoFaturaAttribute($value)
    {
        $this->attributes['data_pagamento_fatura'] = Helpers::formataData($value);
    }

    public function setEncargosAttribute($value)
    {
        !empty($value) ? Helpers::formatarMoeda($value) : 0.00;
    }

    public function setProtecaoPremiadaAttribute($value)
    {
        !empty($value) ? Helpers::formatarMoeda($value) : 0.00;
    }

    public function setIofAttribute($value)
    {
        !empty($value) ? Helpers::formatarMoeda($value) : 0.00;
    }

    public function setJurosAttribute($value)
    {
        !empty($value) || $value != null ? Helpers::formatarMoeda($value) : 0.00;
    }

    public function setValorTotalFaturaAttribute($value)
    {
        !empty($value) || $value != null ? Helpers::formatarMoeda($value) : 0.00;
    }

    public function setValorPagamentoFaturaAttribute($value)
    {
        !empty($value) || $value != null ? Helpers::formatarMoeda($value) : 0.00;
    }

    


    public function getDataPagamentoFaturaFormattedAttribute()
    {
        return Helpers::formataDataEnPt($this->data_pagamento_fatura);
    }

    public function getRestanteFaturaMesAnteriorFormattedAttribute()
    {
        return Helpers::formatarMoedaEnPt($this->restante_fatura_mes_anterior);
    }
    
}
