<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) 
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        if (!Schema::hasTable('areas')) 
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
        if (!Schema::hasTable('personal')) 
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        if (!Schema::hasTable('turnos')) 
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
        });
        if (!Schema::hasTable('horarios')) 
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id');
            $table->integer('personal_id');
            $table->integer('turno_id');
            $table->date('fecha');
            $table->string('guardia_id');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('personal');
        Schema::dropIfExists('turnos');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('horarios');
    }
}
