<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyNecessaryTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->datetime('date')->change();       
            $table->text('detail')->change();
        });

        Schema::table('records', function (Blueprint $table) {
            $table->renameColumn('date', 'date_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->date('date_time')->change();
        });

        Schema::table('records', function (Blueprint $table) {
            $table->string('detail')->change();
            $table->renameColumn('date_time', 'date');
        });
    }
}
