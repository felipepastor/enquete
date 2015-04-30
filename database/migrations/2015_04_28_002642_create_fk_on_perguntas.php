<?php

use Illuminate\Database\Migrations\Migration;

class CreateFkOnPerguntas extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perguntas', function ($table) {
            $table->foreign('enquete_id')
                ->references('id')
                ->on('enquetes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perguntas', function ($table) {
            $table->dropForeign('enquete_id');
        });
    }

}
