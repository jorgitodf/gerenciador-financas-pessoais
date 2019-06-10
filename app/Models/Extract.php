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

    public function categoria()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

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

    public function getDataMovimentacaoFormattedAttribute()
    {
        return Helpers::formataDataEnPt($this->data_movimentacao);
    }

    public function getMovimentacaoFormattedAttribute()
    {
        return mb_convert_case($this->movimentacao, MB_CASE_TITLE, "UTF-8");    
    }

    public function getValorFormattedAttribute()
    {
        return Helpers::formatarMoedaEnPt($this->valor);
    }

    public function getSaldoFormattedAttribute()
    {
        return Helpers::formatarMoedaEnPt($this->saldo);
    }

}
