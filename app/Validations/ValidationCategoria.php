<?php

namespace App\Validations;

class ValidationCategoria
{
    private $erros = [];

    public function validateCategoria($data, $model = null)
    {

        if ($model::find($data['nome_categoria'])) {
            $this->erros['error-nome-categoria'] = "Categoria já Cadastrada!";
        }

        if (empty($data['nome_categoria']) || $data['nome_categoria'] == null) {
            $this->erros['error-nome-categoria'] = "Preencha a Categoria!";
        /*} else if (preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇºª]+$/", $data['nome_categoria'])) {
            $this->erros['error-nome-categoria'] = "Categoria somente Texto!"; */
        } else if (strlen($data['nome_categoria']) <= 3) {
            $this->erros['error-nome-categoria'] = "Categoria deve conter acima de 3 dígitos!";
        }
        
        if (empty($data['despesa_fixa'])) {
            $this->erros['error-despesa-fixa'] = "Informe se é Despesa Fixa!";
        }

        if (empty($data['tipo'])) {
            $this->erros['error-tipo'] = "Informe o Tipo!";
        }

        return $this->erros;
    }

}