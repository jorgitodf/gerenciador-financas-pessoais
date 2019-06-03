<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'nome_categoria', 'despesa_fixa', 'tipo'
    ];
    

    // Mutator para Modificar o dado antes de salvá-lo no Banco de Dados
    public function setNomeCategoriaAttribute($value)
    {
        $this->attributes['nome_categoria'] = trim(ucwords(strtoupper($value)));
    }

    public function setDespesaFixaAttribute($value)
    {
        if ($value == "Não") {
            $this->attributes['despesa_fixa'] = "N";
        } else if ($value == "Sim") {
            $this->attributes['despesa_fixa'] = "S";
        } else {
            $this->attributes['despesa_fixa'] = trim(strtoupper($value));
        }
    }

    public function setTipoAttribute($value)
    {
        if ($value == "Débito") {
            $this->attributes['tipo'] = "D";
        } else if ($value == "Crédito") {
            $this->attributes['tipo'] = "C";
        } else {
            $this->attributes['tipo'] = trim(strtoupper($value));
        }
    }

    public function getNomeCategoriaFormattedAttribute()
    {
        return ucwords($this->nome_categoria);
    }

    public function getDespesaFixaFormattedAttribute()
    {
        if ($this->despesa_fixa == "N") {
            return "Não";
        } else {
            return "Sim";
        }
    }
    
    public function getTipoFormattedAttribute()
    {
        if ($this->tipo == "D") {
            return "Débito";
        } else {
            return "Crédito";
        }
    }
    
}
