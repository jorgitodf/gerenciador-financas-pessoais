<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_cards', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('descricao', 70)->charset('utf8')->collation('utf8_unicode_ci');
            $table->date('data_compra');
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
        Schema::dropIfExists('expense_cards');
    }
}
