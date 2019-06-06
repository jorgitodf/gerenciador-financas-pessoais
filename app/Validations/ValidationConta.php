<?php

namespace App\Validations;

class ValidationConta
{
    private $erros = [];

    public function validateTipoConta($data, $model = null)
    {

        if ($model::where('tipo_conta', $data['tipo_conta'])->get()->first()) {
            $this->erros['error_tipo_conta'] = "Tipo de Conta já Cadastrada!";
        }

        if (empty($data['tipo_conta']) || $data['tipo_conta'] == null) {
            $this->erros['error_tipo_conta'] = "Preencha o Tipo de Conta!";
        } else if (strlen($data['tipo_conta']) <= 3) {
            $this->erros['error_tipo_conta'] = "Tipo de Conta deve conter acima de 3 dígitos!";
        }

        return $this->erros;
    }

}
