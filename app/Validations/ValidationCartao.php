<?php

namespace App\Validations;

class ValidationCartao
{
    private $erros = [];

    public function validateCartao($data, $model = null)
    {
        /*
        if ($model::find($data['cod_banco'])) {
            $this->erros['error-cod-banco'] = "Banco já Cadastrado!";
        }

        if (empty($data['cod_banco']) || $data['cod_banco'] == null) {
            $this->erros['error-cod-banco'] = "Preencha o Código do Banco!";
        } else if (!is_numeric($data['cod_banco'])) {
            $this->erros['error-cod-banco'] = "Código do Banco somente Números!";
        } else if (strlen($data['cod_banco']) != 3) {
            $this->erros['error-cod-banco'] = "Código do Banco deve conter 3 dígitos!";
        }

        if (empty($data['nome_banco'])) {
            $this->erros['error-nome-banco'] = "Preencha o nome do Banco!";
        } else if (!is_string($data['nome_banco'])) {
            $this->erros['error-nome-banco'] = "Nome do Banco somente Texto!";
        }

        return $this->erros; */
    }

}