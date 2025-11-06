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
        Schema::create('annee_fiscales', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->text("libelle")->nullable();
			$table->text("description")->nullable();
			$table->date("date_debut")->nullable();
			$table->date("date_fin")->nullable();
			$table->text("statut")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('annee_fiscales', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annee_fiscales');
    }
};
