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
        Schema::create('etape_metadonnees', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->bigInteger("etape_id")->nullable()->constrained();
			$table->string("libelle")->nullable();
			$table->string("field_name")->nullable();
			$table->string("type_donnee")->nullable();
			$table->integer("obligatoire")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('etape_metadonnees', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etape_metadonnees');
    }
};
