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
        Schema::create('processus_engages', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->string("type_entite")->nullable();
			$table->bigInteger("entite_id")->nullable()->constrained();
			$table->bigInteger("processus_id")->nullable()->constrained();
            $table->bigInteger("etape_id")->nullable()->constrained();
            $table->text("description")->nullable();
            $table->foreignUuid("initiate_by")->nullable()->constrained();
            $table->string("etat")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('processus_engages', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processus_engages');
    }
};
