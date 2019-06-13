<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable = [
        'numero_cartao', 'data_validade', 'flag_card_id', 'user_id', 'bank_id', 'ativo', 'dia_pgto_fatura'
    ];

    public function banco()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'cod_banco');
    }

    public function bandeira()
    {
        return $this->belongsTo(FlagCards::class, 'flag_card_id', 'id');
    }

    public function despesas()
    {
        return $this->hasMany(ExpenseCard::class, 'credit_card_id', 'id');
    }

    public function faturas()
    {
        return $this->hasMany(InvoiceCard::class, 'credit_card_id', 'id');
    }

    // Mutator para Modificar o dado antes de salvá-lo no Banco de Dados
    public function setNumeroCartaoAttribute($value)
    {
        $this->attributes['numero_cartao'] = trim(str_replace('.', '', $value));
    }

    public function setDataValidadeAttribute($value)
    {
        $this->attributes['data_validade'] = trim(str_replace('/', '', $value));
    }

    public function getAtivoFormattedAttribute()
    {
        if ($this->ativo == "N") {
            return "Não";
        } else {
            return "Sim";
        }
    }

    public function getDiaPgtoFaturaFormattedAttribute()
    {
        return str_pad($this->dia_pgto_fatura, 2, '0', STR_PAD_LEFT);
    }

    public function getDataValidadeFormattedAttribute()
    {
        $tam = strlen($this->data_validade);

        return substr_replace($this->data_validade, "/", $tam - 4).substr($this->data_validade, $tam - 4);
    }

    public function getNumeroCartaoFormattedAttribute()
    {
        return rtrim(chunk_split($this->numero_cartao, 4, "."),'.');
    }

}
