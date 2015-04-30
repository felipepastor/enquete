<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtivaToEnquetesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('enquetes', function(Blueprint $table)
		{
            $table->boolean('ativa')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('enquetes', function(Blueprint $table)
		{
            $table->dropColumn('ativa');
		});
	}

}
