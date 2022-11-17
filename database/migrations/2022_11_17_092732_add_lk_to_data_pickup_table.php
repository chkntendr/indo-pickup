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
            $table->string('luar_kota')->nullable()->after('client');
            $table->string('dalam_kota')->nullable()->after('luar_kota');
            $table->integer('jumlah')->after('dalam_kota');
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
