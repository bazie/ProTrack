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
        Schema::create('etapes', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->bigInteger("processus_id")->nullable()->constrained();
			$table->string("nom_etape")->nullable();
			$table->integer("delai")->nullable();
            $table->bigInteger("level_id")->nullable()->constrained();
			$table->integer("ordre")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('etapes', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapes');
    }
};
