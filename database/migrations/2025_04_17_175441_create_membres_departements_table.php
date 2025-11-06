<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres_departements', function (Blueprint $table) {
            $table->id()->autoIncrement()->primary();
			$table->bigInteger("departement_id")->nullable(false);
			$table->foreignUuid("user_id")->nullable(false);
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('membres_departements', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membres_departements');
    }
};
