<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->tinyIncrements('id'); 
            $table->smallInteger('codigo_agencia')->unique();
            $table->tinyInteger('digito_verificador_agencia')->nullable();
            $table->mediumInteger('numero_conta')->unique();
            $table->tinyInteger('digito_verificador_conta');
            $table->tinyInteger('codigo_operacao')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->mediumInteger('bank_id')->unsigned();
            $table->foreign('bank_id')->references('cod_banco')->on('banks')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('account_type_id')->unsigned();
            $table->foreign('account_type_id')->references('id')->on('account_types')->onUpdate('cascade')->onDelete('cascade'); 
            $table->timestamps();
        }); 
        DB::statement('ALTER TABLE accounts CHANGE COLUMN codigo_agencia codigo_agencia SMALLINT(4) ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE accounts CHANGE COLUMN digito_verificador_agencia digito_verificador_agencia TINYINT(1) UNSIGNED ZEROFILL NULL');
        DB::statement('ALTER TABLE accounts CHANGE COLUMN numero_conta numero_conta MEDIUMINT(7) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE accounts CHANGE COLUMN digito_verificador_conta digito_verificador_conta TINYINT(1) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE accounts CHANGE COLUMN codigo_operacao codigo_operacao SMALLINT(4) UNSIGNED ZEROFILL NULL'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
