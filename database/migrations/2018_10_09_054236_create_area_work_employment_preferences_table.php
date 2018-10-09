<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaWorkEmploymentPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_work_employment_preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employment_preference_id');
            $table->unsignedBigInteger('area_work_id');

            // Relacion con las preferencias de empleo
            $table->foreign('employment_preference_id', 'ep_id_foreign')->references('id')->on('employment_preferences')
            ->onDelete('cascade');

            // Relacion con el area de trabajo
            $table->foreign('area_work_id')->references('id')->on('area_works')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_work_employment_preferences');
    }
}
