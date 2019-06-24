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

    public function getPagamentosAgendados()
    {
        $array = ['pagamentos' => '', 'ano' => ''];

        $pgtos = ScheduledPayment::whereBetween('data_pagamento', [Helpers::data_inicial(), Helpers::data_final()])->orderBy('data_pagamento')->get();

        $mes = Helpers::verificaMes();
        $ano = Helpers::getAno();
        $data = "{$mes} / {$ano}";

        $array['pagamentos'] = $pgtos;
        $array['ano'] = $data;

        return $array;
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
