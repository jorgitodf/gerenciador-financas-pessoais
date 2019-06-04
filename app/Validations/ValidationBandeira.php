<?php

namespace App\Validations;

class ValidationBandeira
{
    private $erros = [];

    public function validateBandeira($data, $model = null)
    {

        if ($model::where('bandeira', '=', $data['bandeira'])->first()) {
            $this->erros['error-nome-bandeira'] = "Bandeira já Cadastrada!";
        }

        if (empty($data['bandeira']) || $data['bandeira'] == null) {
            $this->erros['error-nome-bandeira'] = "Preencha o Nome da Bandeira!";
        } else if (strlen($data['bandeira']) <= 2) {
            $this->erros['error-nome-bandeira'] = "Bandeira deve conter acima de 2 dígitos!";
        } else if (!empty($data['bandeira']) && is_numeric($data['bandeira'])) {
            $this->erros['error_nome_bandeira'] = "Bandeira somente Números!";
        }

        return $this->erros;
    }

}