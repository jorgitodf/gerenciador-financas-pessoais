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

    public function cardPaymentSchedule(array $dados) //método para agendar pagamento do cartão de crédito após quitar a fatura
    {
        $dadoPgtoAgendado = [];
        $movimentacao = "";

        if ($dados['credit_card_id'] == 1) {
            $movimentacao = "Cartão Votorantim";
        } else if ($dados['credit_card_id'] == 2) {
            $movimentacao = "Cartão CEF";
        } else if ($dados['credit_card_id'] == 3) {
            $movimentacao = "Cartão NuBank";
        }

        $dadoPgtoAgendado['data_pagamento'] = Helpers::formataDataEnPt($dados['data_pagamento_fatura']);
        $dadoPgtoAgendado['movimentacao'] = $movimentacao;
        $dadoPgtoAgendado['valor'] = $dados['valor_pagamento_fatura'];
        $dadoPgtoAgendado['pago'] = "Não";
        $dadoPgtoAgendado['category_id'] = 6;
        $dadoPgtoAgendado['account_id'] = session()->get('id_conta');
        $dadoPgtoAgendado['created_at'] = date('Y-m-d H:i:s');
        $dadoPgtoAgendado['updated_at'] = date('Y-m-d H:i:s');

        try {
            ScheduledPayment::create($dadoPgtoAgendado);
            return true;
        } catch (\Illuminate\Database\QueryException $ex) {
            return $error_insert_pagamento_agendado = $ex->getMessage();
        }

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
