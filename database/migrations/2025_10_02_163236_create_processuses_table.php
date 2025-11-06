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
        Schema::create('processuses', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->string("lib_processus")->nullable();
			$table->string("collection_name")->nullable();
            $table->text("description")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('processuses', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processuses');
    }
};
