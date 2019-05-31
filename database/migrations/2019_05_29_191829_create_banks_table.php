<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->mediumInteger('cod_banco')->unique();
            $table->primary('cod_banco');
            $table->string('nome_banco', 90);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE banks CHANGE COLUMN cod_banco cod_banco MEDIUMINT(3) UNSIGNED ZEROFILL NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
