<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = [
        'tipo_conta'
    ];

    public function contas()
    {
        return $this->hasMany(Account::class, 'account_type_id', 'id');
    }

}
