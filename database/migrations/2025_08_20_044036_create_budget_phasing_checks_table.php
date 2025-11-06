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
        Schema::create('budget_phasing_checks', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->foreignUuid("budget_item_id")->nullable()->constrained();
			$table->string("month")->nullable();
			$table->double("amount")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('budget_phasing_checks', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_phasing_checks');
    }
};
