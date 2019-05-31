<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_payments', function (Blueprint $table) {
            $table->increments('id'); 
            $table->date('data_pagamento');
            $table->string('movimentacao')->charset('utf8')->collation('utf8_unicode_ci');
            $table->decimal('valor', 10,2);
            $table->char('pago', 3)->charset('utf8')->collation('utf8_unicode_ci');
            $table->mediumInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade'); 
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
        Schema::dropIfExists('scheduled_payments');
    }
}
