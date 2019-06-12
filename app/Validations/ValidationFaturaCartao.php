<?php

namespace App\Validations;

use App\HelperFormatters\Helpers;
use App\Models\CreditCard;

class ValidationFaturaCartao
{
    private $erros = [];

    public function validateGerarFaturaCartao($data)
    {
        if (empty($data['credit_card_id']) || $data['credit_card_id'] == "Selecione o Cartão!") {
            $this->erros['error_cartao'] = "Selecione o Cartão!";
        }

        $dt = $this->checkDiaPagamentoFatura($data['credit_card_id'], $data['data_pagamento_fatura']);

        if (empty($data['data_pagamento_fatura'])) {
            $this->erros['error_data_pagamento'] = "Informe a Data do Pagamento!";
        } else if (!empty($data['credit_card_id']) && ($dt['dpf'][0]->dia_pgto_fatura != date("d", mktime(0, 0, 0, $dt['mes'], $dt['dia'], $dt['ano'])))) {
            $this->erros['error_data_pagamento'] = "Data de Vencimento da Fatura diferente do dia: ".$dt['dpf'][0]->dia_pgto_fatura."!";
        }

        return $this->erros;
    }


    private function checkDiaPagamentoFatura($id_cartao, $data_pagamento)
    {
        $response = [];

        $cartao = new CreditCard();
        $dpf = $cartao::where('id', $id_cartao)->select('dia_pgto_fatura')->orderBy('id', 'ASC')->take(1)->get();

        $ex = explode("/", $data_pagamento);
        $ano = $ex[2];
        $mes = $ex[1];
        $dia = $ex[0];

        $response['dpf'] = $dpf;
        $response['ano'] = $ano;
        $response['mes'] = $mes;
        $response['dia'] = $dia;

        return $response;
    }

}    