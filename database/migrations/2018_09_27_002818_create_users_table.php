<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->unsignedInteger('identification_type_id')->nullable();
            $table->string('identification_number')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Relacion con la tabla identification_types
            $table->foreign('identification_type_id')->references('id')
            ->on('identification_types')
            ->onDelete('cascade');

            // Relacion con la tabla address
            $table->foreign('address_id')->references('id')
            ->on('addresses')
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
        Schema::dropIfExists('users');
    }
}
