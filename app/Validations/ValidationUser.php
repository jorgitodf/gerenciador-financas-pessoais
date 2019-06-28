<?php

namespace App\Validations;

class ValidationUser
{
    private $error = [];

    public function validateUser($email, $password)
    {
        if (empty($email) && empty($password)) {
            $error['error_login'] = "Informe o E-mail e a Senha!";
        } else if (!empty($email) && empty($password)) {
            $error['error_login'] = "Informe a Senha!";
        } else if (empty($email) && !empty($password)) {
            $erros['error_login'] = "Informe o E-mail!";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros['error_login'] = "Informe um E-mail válido!";
        }

        return $this->erros;
    }

}
