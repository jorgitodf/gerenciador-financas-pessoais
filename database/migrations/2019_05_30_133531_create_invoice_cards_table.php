<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_cards', function (Blueprint $table) {
            $table->increments('id'); 
            $table->date('data_pagamento_fatura');
            $table->decimal('encargos', 5, 2)->nullable()->default(null);
            $table->decimal('protecao_premiada', 5, 2)->nullable()->default(null);
            $table->decimal('iof', 5, 2)->nullable()->default(null);
            $table->enum('pago', ['N', 'S'])->charset('utf8')->collation('utf8_unicode_ci');
            $table->decimal('juros', 5, 2)->nullable()->default(null);
            $table->decimal('valor_total_fatura', 7, 2)->nullable()->default(null);
            $table->decimal('valor_pagamento_fatura', 7, 2)->nullable()->default(null);
            $table->string('ano_mes_ref')->charset('utf8')->collation('utf8_unicode_ci');
            $table->decimal('restante_fatura_mes_anterior', 5, 2)->nullable()->default(null);
            $table->date('data_fechamento_fatura')->nullable()->default(null);
            $table->smallInteger('credit_card_id')->unsigned();
            $table->foreign('credit_card_id')->references('id')->on('credit_cards')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('invoice_cards');
    }
}
