<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnqueteIdToPerguntasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('perguntas', function(Blueprint $table)
        {
            $table->integer('enquete_id')->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('perguntas', function(Blueprint $table)
        {
            $table->dropColumn('enquete_id');
        });
	}

}
