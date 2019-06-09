<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\HelperFormatters\Helpers;

class Extract extends Model
{
    protected $fillable = [
        'data_movimentacao', 'mes', 'tipo_operacao', 'movimentacao', 'quantidade', 'valor', 'saldo', 'category_id', 'account_id',
        'despesa_fixa'
    ];

    public function getSaldo($account_id)
    {
        return Extract::where('account_id', $account_id)->select('saldo')->orderBy('id', 'DESC')->take(1)->get();
    }

    // Mutator para Modificar o dado antes de salvá-lo no Banco de Dados
    public function setValorAttribute($value)
    {
        $this->attributes['valor'] = Helpers::formatarMoeda($value);
    }

    public function setDataMovimentacaoAttribute($value)
    {
        $this->attributes['data_movimentacao'] = Helpers::formataData($value);
    }

    public function setMovimentacaoAttribute($value)
    {
        $this->attributes['movimentacao'] = trim(ucwords(strtolower($value)));
    }

}
