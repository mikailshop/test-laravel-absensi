<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('status_pernikahan', 20)->nullable();
            $table->string('nik_pasangan', 16)->nullable();
			$table->string('nama_pasangan', 50)->nullable();
			$table->string('pekerjaan', 25)->nullable();
			$table->string('no_handphone', 15)->nullable();
            $table->string('no_whatsapp', 15)->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('pasangans');
    }
}
