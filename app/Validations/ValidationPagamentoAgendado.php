<?php

namespace App\Validations;

use App\HelperFormatters\Helpers;

class ValidationPagamentoAgendado
{
    private $erros = [];

    public function validatePagamentoAgendado($data, $model = null, $account_id, $tv = null)
    {
        if ($tv == "create") {
            $pagamento = $model::where([['account_id', $account_id], ['movimentacao', $data['movimentacao']], ['data_pagamento', Helpers::formataData($data['data_pagamento'])]])->select('movimentacao')->get();
            if (!empty($data['movimentacao']) && $pagamento->count() > 0) {
                $this->erros['error_agendamento'] = "Esse Pagamento Já foi Agendado!";
            }
        }

        if (empty($data['data_pagamento']) || $data['data_pagamento'] == "Preencha a Data!") {
            $this->erros['error_data_pgto'] = "Preencha a Data!";
        }

        if (empty($data['movimentacao']) || $data['movimentacao'] == "Preencha a Movimentação!") {
            $this->erros['error_mov'] = "Preencha a Movimentação!";
        } else if (!empty($data['movimentacao']) && is_numeric($data['movimentacao'])) {
            $this->erros['error_mov'] = "Movimentação sem Números!";
        } else if (strlen($data['movimentacao']) < 4) {
            $this->erros['error_mov'] = "Movimentação acima de 3 caracters!";
        }

        if (empty($data['valor']) || $data['valor'] == "Preencha o Valor!") {
            $this->erros['error_valor'] = "Preencha o Valor!";
        } else if (!empty($data['valor']) && !is_numeric(Helpers::formatarMoeda($data['valor']))) {
            $this->erros['error_valor'] = "Valor somente Números!";
        }

        if (empty($data['category_id']) || $data['category_id'] == "Preencha a Categoria!") {
            $this->erros['error_categoria'] = "Preencha a Categoria!";
        }

        return $this->erros;
    }

}
