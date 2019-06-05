<?php

namespace App\Validations;

class ValidationCartaoCredito
{
    private $erros = [];

    public function validateCartao($data, $model = null)
    {
        if (empty($data['numero_cartao'])) {
            $this->erros['error_numero_cartao'] = "Preencha o Número do Cartão!";
        } 

        if (empty($data['data_validade'])) {
            $this->erros['error_data_validade'] = "Informe a Data de Validade do Cartão";
        }

        if (empty($data['flag_card_id'])) {
            $this->erros['error_bandeira'] = "Informe a Bandeira do Cartão!";
        }

        if (empty($data['bank_id'])) {
            $this->erros['error_banco'] = "Informe o Banco do Cartão!";
        } else if (!empty($data['bank_id']) && !is_numeric($data['bank_id'])) {
            $this->erros['error_banco'] = "Banco do Cartão Aceita Somente Números!";
        }

        if (empty($data['ativo'])) {
            $this->erros['error_ativo'] = "Informe se o Cartão Vai Estar Ativo!";
        } 

        if (empty($data['dia_pgto_fatura'])) {
            $this->erros['error_dia_pgto_fatura'] = "Informe o dia do Pagamento do Cartão!";
        } else if (!empty($data['dia_pgto_fatura']) && !is_numeric($data['dia_pgto_fatura'])) {
            $this->erros['error_dia_pgto_fatura'] = "Dia do Pagamento Somente Números!";
        } else if (!empty($data['dia_pgto_fatura']) && is_numeric($data['dia_pgto_fatura']) && $data['dia_pgto_fatura'] > 31) {
            $this->erros['error_dia_pgto_fatura'] = "Dia do Pagamento Deve Ser Entre 1 e 31!";    
        }

        return $this->erros;
    }

}