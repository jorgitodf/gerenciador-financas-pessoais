<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\HelperFormatters\Helpers;

class ExpenseCard extends Model
{
    protected $fillable = [
        'descricao', 'data_compra', 'credit_card_id'
    ];

    public function parcelas()
    {
        return $this->hasMany(ExpenditureInstallment::class, 'expense_card_id', 'id');
    }

    public function cartao()
    {
        return $this->belongsTo(CreditCard::class, 'credit_card_id', 'id');
    }

    public function setDataCompraAttribute($value)
    {
        $this->attributes['data_compra'] = Helpers::formataData($value);
    }
}
