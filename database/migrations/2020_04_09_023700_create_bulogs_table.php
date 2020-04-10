<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulogs', function (Blueprint $table) {
            $table->bigIncrements('bulog_id');
            $table->string('ktp')->nullable()->default(null);
            $table->string('npwp')->nullable()->default(null);
            $table->string('alamat')->nullable()->default(null);
            $table->string('provinsi')->nullable()->default(null);
            $table->string('kota')->nullable()->default(null);
            $table->string('kecamatan')->nullable()->default(null);
            $table->string('kelurahan')->nullable()->default(null);
            $table->string('username')->nullable()->default(null);
            $table->string('pemilik')->nullable()->default(null);
            $table->string('toko')->nullable()->default(null);
            $table->string('entitas')->nullable()->default(null);
            $table->string('dc')->nullable()->default(null);
            $table->string('kategori')->nullable()->default(null);
            $table->bigInteger('telfon')->nullable()->default(null);
            $table->string('keterangan')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
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
        Schema::dropIfExists('bulogs');
    }
}
