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
        Schema::create('budgets', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->foreignId("annee_fiscale_id")->nullable()->constrained();
			$table->foreignUuid("responsable_budget_id")->nullable();
			$table->string("responsable_budget_nom")->nullable();
			$table->string("type_entite")->nullable();
			$table->bigInteger("projet_id")->nullable();
			$table->bigInteger("departement_id")->nullable();
			$table->string("statut")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('budgets', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
};
