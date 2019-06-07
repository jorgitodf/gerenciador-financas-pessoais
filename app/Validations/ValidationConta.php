<?php

namespace App\Validations;

class ValidationConta
{
    private $erros = [];

    public function validateTipoConta($data, $model = null, $tv = null)
    {
        if ($tv == "create") {
            if ($model::where('tipo_conta', $data['tipo_conta'])->get()->first()) {
                $this->erros['error_tipo_conta'] = "Tipo de Conta já Cadastrada!";
            }
        }

        if (empty($data['tipo_conta']) || $data['tipo_conta'] == null) {
            $this->erros['error_tipo_conta'] = "Preencha o Tipo de Conta!";
        } else if (strlen($data['tipo_conta']) <= 3) {
            $this->erros['error_tipo_conta'] = "Tipo de Conta deve conter acima de 3 dígitos!";
        }

        return $this->erros;
    }

    public function validateConta($data, $model = null, $tv = null)
    {
        if ($tv == "create") {
            if ($model::where('numero_conta', $data['numero_conta'])->get()->first()) {
                $this->erros['error_conta'] = "Essa Conta já está Cadastrada!";
            }
        }

        if (empty($data['codigo_agencia'])) {
            $this->erros['error_cod_agencia'] = "Preencha o Código da Agência!";
        } else if (!empty($data['codigo_agencia']) && !is_numeric($data['codigo_agencia'])) {
            $this->erros['error_cod_agencia'] = "Cód. da Agência somente Números!";
        } else if (strlen($data['codigo_agencia']) < 4 || strlen($data['codigo_agencia']) > 4) {
            $this->erros['error_cod_agencia'] = "Cód. da Agência deve conter até 4 dígitos!";
        }

        if (!empty($data['digito_verificador_agencia']) && !is_numeric($data['digito_verificador_agencia'])) {
            $this->erros['error_dig_ver_agencia'] = "Díg. Verificador da Agência somente Números!";
        } else if (!empty($data['digito_verificador_agencia']) && strlen($data['digito_verificador_agencia']) != 1) {
            $this->erros['error_dig_ver_agencia'] = "Díg. Verificador da Ag. deve conter 1 dígito!";
        }

        if (empty($data['numero_conta'])) {
            $this->erros['error_num_conta'] = "Preencha o Número da Conta!";
        } else if (!empty($data['numero_conta']) && !is_numeric($data['numero_conta'])) {
            $this->erros['error_num_conta'] = "Número da Conta somente Números!";
        } else if (strlen($data['numero_conta']) > 9) {
            $this->erros['error_num_conta'] = "Número da Conta deve conter até 9 dígitos!";
        }

        if (empty($data['digito_verificador_conta'])) {
            $this->erros['error_dig_ver_conta'] = "Preencha o Dígito Verificador da Conta!";
        } else if (!empty($data['digito_verificador_conta']) && !is_numeric($data['digito_verificador_conta'])) {
            $this->erros['error_dig_ver_conta'] = "Díg. Verif. da Conta somente Números!";
        } else  if (strlen($data['digito_verificador_conta']) != 1) {
            $this->erros['error_dig_ver_conta'] = "Díg. Verif. da Conta deve conter 1 dígito!";
        }

        if (!empty($data['codigo_operacao']) && !is_numeric($data['codigo_operacao'])) {
            $this->erros['error_cod_operacao'] = "Cód. da Operação somente Números!";
        } else if (!empty($data['codigo_operacao']) && (strlen($data['codigo_operacao']) > 3 || strlen($data['codigo_operacao']) < 3 )) {
            $this->erros['error_cod_operacao'] = "Cód. da Operação deve conter até 3 dígitos!";
        }

        if (empty($data['account_type_id'])) {
            $this->erros['error_tp_conta'] = "Preencha o Tipo da Conta!";
        }

        if (empty($data['bank_id'])) {
            $this->erros['error_banco'] = "Selecione o Banco!";
        }

        return $this->erros;
    }

}
