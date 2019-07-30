<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\HelperFormatters\Helpers;

class InvoiceCard extends Model
{
    protected $fillable = [
        'data_pagamento_fatura', 'encargos', 'protecao_premiada', 'iof', 'pago', 'anuidade', 'juros', 'valor_total_fatura', 'valor_pagamento_fatura',
        'ano_mes_ref', 'restante_fatura_mes_anterior', 'data_fechamento_fatura', 'credit_card_id'
    ];

    public function cartao()
    {
        return $this->belongsTo(CreditCard::class, 'credit_card_id', 'id');
    }


    public function setDataPagamentoFaturaAttribute($value)
    {
        
        if (strpos($value, "/")) {
            $this->attributes['data_pagamento_fatura'] = Helpers::formataData($value);
        } else {
            $this->attributes['data_pagamento_fatura'] = $value;
        }
        
    }

    public function setEncargosAttribute($value)
    {
        !empty($value) ? $this->attributes['encargos'] = Helpers::formatarMoeda($value) : $this->attributes['encargos'] = 0.00;
    }

    public function setProtecaoPremiadaAttribute($value)
    {
        !empty($value) ? $this->attributes['protecao_premiada'] = Helpers::formatarMoeda($value) : $this->attributes['protecao_premiada'] = 0.00;
    }

    public function setIofAttribute($value)
    {
        !empty($value) ? $this->attributes['iof'] = Helpers::formatarMoeda($value) : $this->attributes['iof'] = 0.00;
    }

    public function setAnuidadeAttribute($value)
    {
        !empty($value) ? $this->attributes['anuidade'] = Helpers::formatarMoeda($value) : $this->attributes['anuidade'] = 0.00;
    }

    public function setJurosAttribute($value)
    {
        !empty($value) ? $this->attributes['juros'] = Helpers::formatarMoeda($value) : $this->attributes['juros'] = 0.00;
    }

    public function setValorTotalFaturaAttribute($value)
    {
        !empty($value) ? $this->attributes['valor_total_fatura'] = Helpers::formatarMoeda($value) : $this->attributes['valor_total_fatura'] = 0.00;
    }

    public function setValorPagamentoFaturaAttribute($value)
    {
        !empty($value) ? $this->attributes['valor_pagamento_fatura'] = Helpers::formatarMoeda($value) : $this->attributes['valor_pagamento_fatura'] = 0.00;
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
