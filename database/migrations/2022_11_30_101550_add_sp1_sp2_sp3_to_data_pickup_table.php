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
        Schema::table('data_pickup', function (Blueprint $table) {
            $table->string('tujuan')->default('')->after('client');
            $table->integer('sp1')->default('0')->after('tujuan');
            $table->integer('sp2')->default('0')->after('sp1');
            $table->integer('sp3')->default('0')->after('sp2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_pickup', function (Blueprint $table) {
            //
        });
    }
};
