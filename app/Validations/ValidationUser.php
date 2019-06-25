<?php

namespace App\Validations;

class ValidationUser
{
    private $erros = [];

    public function validateUser($data)
    {
        if (empty($data['email']) || $data['email'] == null) {
            $this->erros['error_email'] = "Preencha o seu E-mail!";
        }

        if (empty($data['password']) || $data['password'] == null) {
            $this->erros['error_password'] = "Preencha a sua Senha!";
        }

        return $this->erros;
    }

}
