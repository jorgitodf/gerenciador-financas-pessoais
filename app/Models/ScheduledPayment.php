<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\HelperFormatters\Helpers;

class ScheduledPayment extends Model
{
    protected $fillable = [
       'data_pagamento', 'movimentacao', 'valor', 'pago', 'category_id', 'account_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    // Mutator para Modificar o dado antes de salvá-lo no Banco de Dados
    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = Helpers::formatarMoeda($value);
    }

    public function setDataPagamentoAttribute($value)
    {
        $this->attributes['data_pagamento'] = Helpers::formataData($value);
    }

    public function setMovimentacaoAttribute($value)
    {
        $this->attributes['movimentacao'] = trim(ucwords(strtolower($value)));
    }

    public function getDataPagamentoFormattedAttribute()
    {
        return Helpers::formataDataEnPt($this->data_pagamento);
    }

    public function getMovimentacaoFormattedAttribute()
    {
        return mb_convert_case($this->movimentacao, MB_CASE_TITLE, "UTF-8");    
    }

    public function getValorFormattedAttribute()
    {
        return Helpers::formatarMoedaEnPt($this->valor);
    }

}
