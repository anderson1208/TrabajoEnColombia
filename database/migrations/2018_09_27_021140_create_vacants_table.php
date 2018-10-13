<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('area_work_id');
            $table->string('area_work_other')->nullable();
            $table->unsignedInteger('working_day_id');
            $table->unsignedInteger('contract_type_id');
            $table->string('title');
            $table->text('description');
            $table->double('salary');
            $table->unsignedInteger('amount')->default(1);
            $table->timestamp('expired_date');
            $table->unsignedInteger('year_experiences')->default(0);
            $table->unsignedInteger('education_level_id')->nullable();
            $table->unsignedInteger('payment_interval_id')->nullable();
            $table->timestamps();

            // Relacion con la empresa
            $table->foreign('company_id')->references('id')->on('companies')
            ->onDelete('cascade');

            // Relacion con el area de trabajo
            $table->foreign('area_work_id')->references('id')->on('area_works')
            ->onDelete('cascade');

            // Relacion con la jornada
            $table->foreign('working_day_id')->references('id')->on('working_days')
            ->onDelete('cascade');

            // Relacion con la tipo de contrato
            $table->foreign('contract_type_id')->references('id')->on('contract_types')
            ->onDelete('cascade');

            // Relacion con el nivel de educación
            $table->foreign('education_level_id')->references('id')->on('education_levels')
            ->onDelete('cascade');

            // Relacion con el nivel de educación
            $table->foreign('payment_interval_id')->references('id')->on('payment_intervals')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacants');
    }
}
