<?php

namespace App\Validations;

use App\HelperFormatters\Helpers;

class ValidationDebitoCredito
{
    private $erros = [];

    public function validateCredito($data, $model = null)
    {
        if (empty($data['data_movimentacao']) || $data['data_movimentacao'] == "Preencha a Data!") {
            $this->erros['error_data_mov'] = "Preencha a Data!";
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

    public function validateDebito($data, $model = null, $id_account)
    {
        $valor_saldo = $model->getSaldo($id_account);
        if (!empty($data['valor']) && empty($valor_saldo[0]->saldo)) {
            $this->erros['error_saldo'] = "Saldo Insuficente para Debitar!";
        } else if (!empty($data['valor']) && (Helpers::formatarMoeda($data['valor']) > $valor_saldo[0]->saldo)) {
            $this->erros['error_saldo'] = "Valor superior ao Saldo Atual!";
        }

        if (empty($data['data_movimentacao']) || $data['data_movimentacao'] == "Preencha a Data!") {
            $this->erros['error_data_mov'] = "Preencha a Data!";
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
