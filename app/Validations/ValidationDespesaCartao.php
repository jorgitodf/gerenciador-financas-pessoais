<?php

namespace App\Validations;

use App\HelperFormatters\Helpers;

class ValidationDespesaCartao
{
    private $erros = [];

    public function validateDespesaCartao($data, $model = null, $tv = null)
    {
        if (empty($data['credit_card_id'])) {
            $this->erros['error_cartao'] = "Informe o Cartão!";
        }

        if (empty($data['descricao'])) {
            $this->erros['error_descricao'] = "Preencha a Descrição!";
        } else if (!empty($data['descricao']) && is_numeric($data['descricao'])) {
            $this->erros['error_descricao'] = "Descrição sem Números!";
        } else if (strlen($data['descricao']) < 4) {
            $this->erros['error_descricao'] = "Descrição acima de 3 caracters!";
        }

        if (empty($data['data_compra'])) {
            $this->erros['error_data_compra'] = "Informe a Data da Compra!";
        } 

        if (empty($data['valor'])) {
            $this->erros['error_valor'] = "Preencha o Valor!";
        } else if (!empty($data['valor']) && !is_numeric(Helpers::formatarMoeda($data['valor']))) {
            $this->erros['error_valor'] = "Valor somente Números!";
        }

        if (empty($data['numero_parcela']) || $data['numero_parcela'] == null) {
            $this->erros['error_numero_parcela'] = "Informe o Número de Parcela(s)!";
        }
        
        return $this->erros;
    }

}    