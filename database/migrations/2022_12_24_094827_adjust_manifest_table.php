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
        Schema::table('manifest', function (Blueprint $table) {
            $table->integer('total')->after('uploaded_at');
            $table->varchar('tujuan')->after('total');
            $table->text('barcode')->after('tujuan');
            $table->integer('koli')->after('barcode');
            $table->integer('berat')->after('koli');
            $table->integer('harga')->after('berat');
            $table->integer('packing')->after('harga');
            $table->integer('total_kiriman')->after('packing');
            $table->integer('keterangan')->after('total_kiriman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manifest', function (Blueprint $table) {
            //
        });
    }
};
