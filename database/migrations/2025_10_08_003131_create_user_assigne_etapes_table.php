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
        Schema::create('user_assigne_etapes', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->foreignUuid("user_id")->nullable()->constrained();
			$table->foreignUuid("processus_engage_id")->nullable()->constrained();
			$table->foreignUuid("assignate_by")->nullable()->constrained();
			$table->bigInteger("etape_id")->nullable()->constrained();
			$table->date("date_assignation")->nullable();
			$table->string("approbation")->nullable();
			$table->date("date_approbation")->nullable();
			$table->longText("commentaire")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('user_assigne_etapes', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_assigne_etapes');
    }
};
