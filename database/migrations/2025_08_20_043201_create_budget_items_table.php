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
        Schema::create('budget_items', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->foreignUuid("budget_id")->nullable()->constrained();
			$table->string("location")->nullable();
			$table->string("activity_description")->nullable();
			$table->foreignId("categorie_approvisionnement_id")->nullable()->constrained();
			$table->string("sap_output_code")->nullable();
			$table->string("cost_centre")->nullable();
			$table->string("gl_account")->nullable();
			$table->string("grant")->nullable();
			$table->string("fund")->nullable();
			$table->bigInteger("number_of_unit")->nullable();
			$table->string("unit_of_measure")->nullable();
			$table->double("unit_cost")->nullable();
			$table->bigInteger("quantity")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('budget_items', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_items');
    }
};
