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
        Schema::create('departements', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->string("dep_name")->nullable();
			$table->foreignUuid("id_manager")->nullable();
			$table->string("manager_name")->nullable();
			$table->string("manage_email")->nullable();
            $table->text("directory")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('departements', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departements');
    }
};
