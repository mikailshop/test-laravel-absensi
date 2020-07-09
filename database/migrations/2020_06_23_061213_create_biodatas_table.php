<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('gol_darah', 2)->nullable();
            $table->string('no_sim_a', 20)->nullable();
            $table->string('no_sim_c', 20)->nullable();
            $table->string('no_passport', 25)->nullable();
            $table->string('no_npwp', 25)->nullable();
            $table->string('no_bpjs_tk', 25)->nullable();
            $table->string('status_kepesertaan_tk', 20)->nullable();
            $table->string('no_bpjs_kes', 25)->nullable();
            $table->string('status_kepesertaan_kes', 20)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('biodatas');
    }
}
