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
        Schema::create('national_organisations', function (Blueprint $table) {
            $table->id()->primary();
			$table->string("short_name")->nullable();
			$table->string("name")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('national_organisations', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('national_organisations');
    }
};
