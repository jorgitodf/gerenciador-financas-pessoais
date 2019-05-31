<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenditureInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditure_installments', function (Blueprint $table) {
            $table->increments('id'); 
            $table->double('valor', 5, 2);
            $table->string('numero_parcela', 6)->charset('utf8')->collation('utf8_unicode_ci');
            $table->date('data_pagamento');
            $table->integer('expense_card_id')->unsigned();
            $table->foreign('expense_card_id')->references('id')->on('expense_cards')->onUpdate('cascade')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenditure_installments');
    }
}
