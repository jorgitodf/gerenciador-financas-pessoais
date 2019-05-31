<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extracts', function (Blueprint $table) {
            $table->increments('id'); 
            $table->date('data_movimentacao');
            $table->string('mes', 20)->charset('utf8')->collation('utf8_unicode_ci');
            $table->enum('tipo_operacao', ['Débito', 'Crédito'])->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('movimentacao', 60)->charset('utf8')->collation('utf8_unicode_ci');
            $table->smallInteger('quantidade');
            $table->decimal('valor', 10,2);
            $table->decimal('saldo', 10,2);
            $table->mediumInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->char('despesa_fixa', 1)->charset('utf8')->collation('utf8_unicode_ci'); 
            $table->timestamps();
        });
        DB::statement('ALTER TABLE extracts CHANGE COLUMN quantidade quantidade SMALLINT(2) NOT NULL'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extracts');
    }
}
