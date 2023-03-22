<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Changes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('turnos', function (Blueprint $table) {
           $table->string('inicio')->after('descripcion');
           $table->string('fin')->after('inicio');
        });
        Schema::table('horarios', function (Blueprint $table) {
            $table->date('fecha_fin')->after('fecha');
            $table->string('dia')->after('fecha_fin');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('turnos', function (Blueprint $table) {
            $table->dropColumn('inicio');
            $table->dropColumn('fin');
        });
        Schema::table('horarios', function (Blueprint $table) {
            $table->dropColumn('fecha_fin');
            $table->dropColumn('dia');
        });
    }
}
