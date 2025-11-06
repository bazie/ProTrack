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
        Schema::create('document_etape_uploads', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->bigInteger("document_etape_id")->nullable()->constrained();
			$table->foreignUuid("processus_engage_id")->nullable()->constrained();
			$table->string("titre")->nullable();
			$table->string("url")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('document_etape_uploads', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_etape_uploads');
    }
};
