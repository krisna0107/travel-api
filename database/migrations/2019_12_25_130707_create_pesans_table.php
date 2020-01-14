<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->string('kd_book', 50);
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('konten_id');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->bigInteger('total_harga')->nullable();
            $table->enum('status', ['P', 'D']);
            $table->string('bank')->nullable();
            $table->string('va')->nullable();
            $table->primary('kd_book');
            $table->foreign('user_id')->references('id')->on('akuns');
            $table->foreign('konten_id')->references('id')->on('kontens');
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
        Schema::dropIfExists('pesans');
    }
}
