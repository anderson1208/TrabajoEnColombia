<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curriculum_vitae_id');
            $table->string('school_name');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('file')->nullable();
            $table->unsignedInteger('education_state_id');
            $table->unsignedInteger('education_level_id');
            $table->timestamps();

            // relacion con la tabla de la hoja de vida 
            $table->foreign('curriculum_vitae_id')->references('id')->on('curriculum_vitaes')
            ->onDelete('cascade');

            // Relacion con la tabla education_state
            $table->foreign('education_state_id')->references('id')->on('education_states')->onDelete('cascade');

            // Relacion con la tabla education_state
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_informations');
    }
}
