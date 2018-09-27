<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVacantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vacants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vacant_id');
            $table->unsignedInteger('vacant_state_id');
            $table->timestamps();

            // relacion con la tabla de usuarios
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');

            // relacion con la tabla de usuarios
            $table->foreign('vacant_id')->references('id')->on('vacants')
            ->onDelete('cascade');

            // relacion con la tabla de usuarios
            $table->foreign('vacant_state_id')->references('id')->on('vacant_states')
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
        Schema::dropIfExists('user_vacants');
    }
}
