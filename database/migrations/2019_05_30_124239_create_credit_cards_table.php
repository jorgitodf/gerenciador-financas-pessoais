<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->smallIncrements('id'); 
            $table->bigInteger('numero_cartao');
            $table->string('data_validade', 7)->charset('utf8')->collation('utf8_unicode_ci');
            $table->tinyInteger('flag_card_id')->unsigned();
            $table->foreign('flag_card_id')->references('id')->on('flag_cards')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->mediumInteger('bank_id')->unsigned();
            $table->foreign('bank_id')->references('cod_banco')->on('banks')->onUpdate('cascade')->onDelete('cascade');
            $table->char('ativo', 1)->charset('utf8')->collation('utf8_unicode_ci');
            $table->smallInteger('dia_pgto_fatura')->unsigned(); 
            $table->timestamps();
        }); 
        DB::statement('ALTER TABLE credit_cards CHANGE COLUMN numero_cartao numero_cartao BIGINT(16) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE credit_cards CHANGE COLUMN dia_pgto_fatura dia_pgto_fatura SMALLINT(2) ZEROFILL NOT NULL'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_cards');
    }
}
