<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teknisi_id');
            $table->foreignId('owner_id');
            $table->foreignId('kategori_id');

            $table->string('keluhan1');
            $table->string('keluhan2');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->string('total_harga');
            $table->enum('status', ['Sedang Dikerjakan', 'Selesai'])->default('Sedang Dikerjakan');
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
        Schema::dropIfExists('services');
    }
}
