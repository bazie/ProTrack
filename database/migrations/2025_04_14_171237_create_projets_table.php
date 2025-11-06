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
        Schema::create('projets', function (Blueprint $table) {
            $table->id()->autoIncrement();
			$table->string("code")->nullable();
			$table->text("full_name")->nullable();
			$table->string("short_name")->nullable();
			$table->string("donor")->nullable();
			$table->string("national_organisation")->nullable();
			$table->string("country_office")->nullable();
			$table->date("start_date")->nullable();
			$table->date("grant_end_date")->nullable();
			$table->date("project_end_date")->nullable();
			$table->string("gik")->nullable();
			$table->string("tracking_fad")->nullable();
			$table->text("name_framework")->nullable();
			$table->decimal("approved_country_cost_ratio")->nullable();
			$table->double("direct_cost")->nullable();
			$table->double("apportioned_cost")->nullable();
			$table->double("no_cost_in_co_buget")->nullable();
			$table->foreignUuid("id_manger")->nullable();
			$table->string("manager_name")->nullable();
			$table->string("manager_email")->nullable();
			$table->text("directory")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('projets', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
};
